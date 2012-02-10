var image_crops = new Array();
var image_ids = new Array();
var gallery_offset = 0;
var gallery_limit = 12;
var current_crop_action;
var image_hash_id;
var came_from_select;
var instance = 'default';

$(document).ready(function() {
	set_image_crops();
	$('#modal_manage_images .loading_icon').hide();
	
	$('#manage_images_link').click(function() {
		instance = 'default';
	});
	
	$('#manage_images_button').click(function() {
		instance = 'article';
	});
	
	$('#tinymce_pigeonimage').click(function() {
		instance = 'inline';
	});
	
	$('#article_thumbnail').click(function() {
		$('#manage_images_button').click();
	});
	
	$('#modal_manage_images').bind('show', function () {
		reset_modal();
	});
	
	$('.image_select_gallery .image_container').live('click', function () {
		if ($(this).hasClass('selected')) {
			return;
		} else {
			$('.image_select_gallery .image_container').removeClass('selected').addClass('not_selected');
			$(this).removeClass('not_selected').addClass('selected');
		}
	});	
	
	$('#upload_image_button').click(function() {
		enable_image_upload();
	});
	
	$('#add_related_image_button').click(function() {
		gallery_offset = 0;
		enable_image_select();
	});
	
	$('#image_select_button').click(function() {
		$('.image_select_gallery .image_container').each(function() {
			if ($(this).hasClass('selected')) {
				if (instance == 'article') {
					$('#image_hash').val($(this).attr('image_hash'));
					$('#article_thumbnail').html('<img src="" alt="'+$(this).attr('image_hash')+'" />');
					$('#article_thumbnail img').attr('src', $(this).find('img').attr('src'));
					$('#modal_manage_images').modal('hide');
				} else if (instance == 'inline') {
					var image_hash = $(this).attr('image_hash');
					if (current_modal_action == 'related_image_select') {
						var image_src = $(this).find('img').attr('src');
						image_src = image_src.replace('_thumbnail', '_main');
						tinyMCE.execCommand('mceInsertContent',false,'<img src="'+image_src+'" path="'+image_hash+'" />');
						$('#modal_manage_images').modal('hide');
					} else {
						var article_id = $('#article_form #id').val();
						if (article_id != null) {
							add_related_image(article_id, image_hash);
						} else {
							alert('Please save the article first');
						}
					}
				}
			}
		});
	});
	
	$('#modal_manage_images .crop_action').live('click', function() {	
		var image_hash = $(this).parent().attr('image_hash');
		var datastring = 'image_hash='+image_hash+'&image_crop_id=1'; // get original crop image
		$(this).attr('disabled', 'disabled');
		came_from_select = true;
		$('#modal_manage_images .loading_icon').fadeIn(250);
		$.ajax({
			url: '/ajax/image/getoriginal',
			type: 'post',
			dataType: 'json',
			data: datastring,
			success: function(data) {
				$('#modal_manage_images .loading_icon').fadeOut(250);
				$('#upload_area').html(data['html']);
				$(this).removeAttr('disabled');
				enable_image_crop(current_crop_action);
			},
			error: function() {
				$(this).removeAttr('disabled');
				$('#modal_manage_images .loading_icon').fadeOut(250);
				alert('An error occured, please try again');
			}
		});
	});
	
	$('#modal_manage_images .delete_action').live('click', function() {
		if (confirm('Are you sure?')) {
			var image_hash = $(this).parent().attr('image_hash');
			var datastring = 'image_hash='+image_hash
			$(this).attr('disabled', 'disabled');
			$('#modal_manage_images .loading_icon').fadeIn(250);
			$.ajax({
				url: '/ajax/image/delete',
				type: 'post',
				dataType: 'json',
				data: datastring,
				success: function(data) {
					$('#modal_manage_images .loading_icon').fadeOut(250);
					$(this).removeAttr('disabled');
					if (image_hash == $('#image_hash').val()) {
						$('#article_thumbnail').html('No Image');
					}
					reset_modal();
				},
				error: function() {
					$(this).removeAttr('disabled');
					$('#modal_manage_images .loading_icon').fadeOut(250);
					alert('An error occured, please try again');
				}
			});
		}
	});
	
	$('#modal_manage_images .remove_action').live('click', function() {
		if (confirm('Are you sure?')) {
			$('#modal_manage_images .loading_icon').fadeIn(250);
			var article_id = $('#article_form #id').val();
			if (article_id != null) {
				var image_hash = $(this).parent().attr('image_hash');
				var datastring = 'article_id='+article_id+'&image_hash='+image_hash
				$(this).attr('disabled', 'disabled');
				$.ajax({
					url: '/ajax/post/article/image/remove',
					type: 'post',
					dataType: 'json',
					data: datastring,
					success: function(data) {
						$('#modal_manage_images .loading_icon').fadeOut(250);
						$(this).removeAttr('disabled');
						reset_modal();
					},
					error: function() {
						$('#modal_manage_images .loading_icon').fadeOut(250);
						alert('An error occured, please try again');
						$(this).removeAttr('disabled');
					}
				});
			} else {
				alert('Please save the article first');
			}			
		}
	});
	
	$('#image_upload_button').click(function() {
		$('#upload_area').show();
	});
	
    $('#image_crop_button').click(function() {
		if (check_coords()) {
			submit_crop_form();
		}
    });
	
	$('#load_more_button').click(function() {
		gallery_load_more(false);
	});
	
	$('#modal_manage_images .close').click(function() {
		if (current_modal_action == 'related_image_select' || current_modal_action == 'image_select' || current_modal_action == 'image_upload') {
			$('#modal_manage_images').modal('hide');
		} else {
			if (confirm('You have not finished cropping the current image. Discard all changes?')) {
				$('#modal_manage_images').modal('hide');
			}
		}
	});
	
	$(window).keyup(function(e) {
		var code = (e.keyCode ? e.keyCode : e.which);
		e.preventDefault();
		if($('#modal_manage_images').is(":visible")) {
			switch(code) {
				case KEYCODE_ESC:
					if (current_modal_action == 'related_image_select' || current_modal_action == 'image_select' || current_modal_action == 'image_upload') {
						$('#modal_manage_images').modal('hide');
					} else {
						if (confirm('You have not finished cropping the current image. Discard all changes?')) {
							$('#modal_manage_images').modal('hide');
						}
					}
					break;
				case KEYCODE_ENTER:
					switch(current_modal_action) {
						case 'related_image_select':
							$('#add_related_image_button').click();
							break;
						case 'image_select':
							$('#load_more_button').click();
							break;
						case 'image_upload':
							$('#image_upload_button').click();
							break;
						case 'image_crop':
							$('#image_crop_button').click();
							break;
					}
					break;	
			}
		}
	});
	
	$('#modal_manage_images #modal_back_button').click(function() {
		switch(current_modal_action) {
			case 'related_image_select':
				$('#modal_manage_images').modal('hide');	
				break;
			case 'image_select':
				if (instance == 'inline') {
					enable_related_image_select();
				} else {
					$('#modal_manage_images').modal('hide');	
				}
				break;
			case 'image_upload':
				gallery_offset = 0;
				enable_image_select();
				break;
			case 'image_crop':
				if (current_crop_action == 0) {
					if (confirm('You have not finished cropping the current image. Discard, and upload another?')) {
						if (came_from_select) {
							reset_modal();
						} else {
							enable_image_upload();
						}
					}
				} else if (current_crop_action > 0) {
					current_crop_action -= 1;
					enable_image_crop(current_crop_action);
				}
				break;
		}
	});
	
});

function set_image_crops() {
	$('.image_crops').each(function() {
		if ($(this).val() != 'original') {
			image_crops.push(new Array($(this).val(), $(this).attr('ratio'), $(this).attr('width'), $(this).attr('crop_id')));	
		}
	});
}

function reset_modal() {
	current_crop_action = 0;
	gallery_offset = 0;
	came_from_select = false;
	if (instance == 'inline') {
		current_modal_action = 'related_image_select';
		enable_related_image_select();
	} else {
		current_modal_action = 'image_select';
		enable_image_select();
	}
}

function submit_crop_form() {
	$('#image_crop_button').attr('disabled', 'disabled');
	$('#modal_back_button').attr('disabled', 'disabled');
	var datastring = $('#image_crop_form').serialize();
	$('#modal_manage_images .loading_icon').fadeIn(250);
	$.ajax({
		url: '/ajax/image/crop',
		type: 'post',
		dataType: 'json',
		data: datastring,
		success: function(d) {
			$('#modal_manage_images .loading_icon').fadeOut(250);
			$('#image_crop_button').removeAttr('disabled');
			$('#modal_back_button').removeAttr('disabled');
			current_crop_action += 1;
			if (current_crop_action <= (image_crops.length - 1)) {
				enable_image_crop(current_crop_action);
			} else {
				var datastring = 'image_hash='+image_hash_id+'&status=a';
				$('#submit_article_button').attr('disabled', 'disabled');
				$.ajax({
					url: '/ajax/image/status',
					type: 'post',
					dataType: 'json',
					data: datastring,
					success: function(data) {
						if (instance == 'article') {
							$('#image_hash').val(image_hash_id);
							$('#article_thumbnail').html('<img src="" alt="'+image_hash_id+'" />');
							$('#article_thumbnail img').attr('src', data['thumbnail']);
							$('#modal_manage_images').modal('hide');
						} else if (instance == 'inline') {
							var article_id = $('#article_form #id').val();
							if (article_id != null) {
								add_related_image(article_id, image_hash_id);
							} else {
								alert('Please save the article first');
							}
						} else {
							reset_modal();
						}
						$('#submit_article_button').removeAttr('disabled');
					},
					error: function() {
						$('#modal_manage_images .loading_icon').fadeOut(250);
						alert('An error occured, please try again');
						$('#submit_article_button').removeAttr('disabled');
					}
				});
			}
		},
        error: function() {
			$('#image_crop_button').removeAttr('disabled');
			$('#modal_back_button').removeAttr('disabled');
            alert('An error occured, please try again');
        }
	});
}

function disable_all() {
	$('#modal_manage_images .image_select_gallery .image_container').removeClass('selected').removeClass('not_selected');
	$('#modal_manage_images .modal_action').hide();
}

function enable_image_select() {
	disable_all();
	current_modal_action = 'image_select';
	gallery_load_more(true);
	scroll_top();
}

function enable_related_image_select() {
	disable_all();
	current_modal_action = 'related_image_select';
	var article_id = $('#article_form #id').val();
	if (article_id != null) {
		gallery_load_related(article_id);
	} else {
		if (confirm('You must save the article before you can associate an image. Close window?')) {
			$('#modal_manage_images .close').click();
			return;
		} else {
			gallery_load_more(true);
		}
	}
	scroll_top();
}

function gallery_load_more(reset) {
	var selection_made = false;
	if (instance == 'default') {
		$('#manage_images_title').html('Image Gallery');
		$('#image_select_button').hide();
	} else if (instance == 'inline') {
		$('#manage_images_title').html('Image Gallery');
		$('#image_select_button').val('Select Image');
		$('#image_select_button').show();
	} else {
		$('#manage_images_title').html('Select Feature Image');
		$('#image_select_button').val('Select Image');
		$('#image_select_button').show();
	}
	if ($('#image_select .image_select_gallery .image_container').hasClass('selected')) { var selection_made = true; }
	var datastring = 'limit='+gallery_limit+'&offset='+gallery_offset+'&selection_made='+selection_made;
	$('#modal_manage_images .loading_icon').fadeIn(250);
	$.ajax({
		url: '/ajax/image/gallery',
		type: 'post',
		dataType: 'json',
		data: datastring,
		success: function(d) {
			$('#modal_manage_images .loading_icon').fadeOut(250);
			if (reset) {
				if (d['html'] == '') {
					$('#image_select .image_select_gallery').html('<h5>No images, click button below to upload</h5>');
				} else {
					$('#image_select .image_select_gallery').html(d['html']);
				}
			} else {
				$('.image_select_gallery').append(d['html']);	
			}
			$('#image_select').show();
			$('#upload_image_button').show();
			gallery_offset += gallery_limit;
			if (!d['more']) {
				$('#load_more_button').hide();
			} else {
				$('#load_more_button').show();
			}
		},
		error: function() {
			$('#modal_manage_images .loading_icon').fadeOut(250);
			alert('An error occured, please try again');
		}
	});
}

function gallery_load_related(article_id) {
	var selection_made = false;
	$('#manage_images_title').html('Manage Article\'s Images');
	$('#image_select_button').val('Insert Image');
	if ($('#related_image_select .image_select_gallery .image_container').hasClass('selected')) { var selection_made = true; }
	var datastring = 'article_id='+article_id;
	$('#modal_manage_images .loading_icon').fadeIn(250);
	$.ajax({
		url: '/ajax/get/article/images',
		type: 'get',
		dataType: 'json',
		data: datastring,
		success: function(data) {
			$('#modal_manage_images .loading_icon').fadeOut(250);
			if (data['html'] == '') {
				$('#related_image_select .image_select_gallery').html('<h5>No images, click button below to upload</h5>');
			} else {
				$('#related_image_select .image_select_gallery').html(data['html']);
			}
			$('#image_select_button').show();
			$('#related_image_select').show();
			$('#add_related_image_button').show();
		},
		error: function(data) {
			$('#modal_manage_images .loading_icon').fadeOut(250);
			alert('An error occured, please try again');
		}
	});
}

function enable_image_upload() {
	disable_all();
	original_image_id = null;
	main_image_id = null;
	thumbnail_image_id = null;
	slider_image_id = null;
	current_modal_action = 'image_upload';
	$('#manage_images_title').html('Upload Image');
	$('#image_upload_form').show();
	$('#image_upload_button').show();
	scroll_top();
}

function enable_image_crop(image_crop) {
	disable_all();
	current_modal_action = 'image_crop';
	
	if ($('#upload_area div.error').length > 0) {
		enable_image_upload();
		$('#upload_area').show();
	} else {
		var max_display_width = $('#image_upload_wrapper').width();
		var image_id = $('#image_id').attr('image_id');
		var image_width = $('#uploaded_image').attr('file_width');
		var image_height = $('#uploaded_image').attr('file_height');
		var image_type = $('#uploaded_image').attr('file_type');
		var image_display_width = image_width;
		var image_display_height = image_height;
		var image_aspect = image_width / image_height;
		var crop_padding = 10;
		image_hash_id = $('#uploaded_image').attr('image_hash');
		
		if (image_width > max_display_width) {
			var ratio = max_display_width / image_width;
			image_display_width = max_display_width;
			image_display_height = Math.round(image_display_height * ratio);
			$('#uploaded_image').css('width', image_display_width+'px');
		} else {
			$('#uploaded_image').css('width', image_width+'px');
		}
		
		$('#crop_img_w').val(image_display_width);
		$('#crop_img_w').val(image_display_width);
		$('#crop_img_h').val(image_display_height);
		$('#file_img_w').val(image_width);
		$('#file_img_h').val(image_height);
		$('#crop_image_hash').val(image_hash_id);
		$('#file_type').val(image_type);
		$('#image_crop_id').val(image_crops[image_crop][3]);
		$('#file_suffix').val(image_crops[image_crop][0]);
		
		if (image_crops[image_crop][1] > 0) {
			var aspect_ratio = image_crops[image_crop][1];
		} else {
			aspect_ratio = 0;
		}

		if (image_crops[image_crop][2] > 0) {
			$('#target_width').val(image_crops[image_crop][2]);
		} else {
			$('#target_width').val(0);
		}
		
		var x1 = null; var y1 = null;
		var x2 = null; var y2 = null;
		
		var recrop = $('#uploaded_image').attr('recrop');
		if (recrop != 'true') {
			$('#object_status').val('u');
			if (aspect_ratio != 0) {
				if (image_display_width == image_display_height && aspect_ratio == 1) {
					
				} else {
					if (aspect_ratio < image_aspect) {
						x1 = Math.round((image_display_width - (image_display_height * aspect_ratio)) / 2);
						y1 = 0;
						x2 = image_display_width - x1;
						y2 = image_display_height;
					} else {
						x1 = 0;
						y1 = Math.round((image_display_height - (image_display_width / aspect_ratio)) / 2);
						x2 = image_display_width;
						y2 = image_display_height - y1;
					}
				}		
			}
			
			if (x1 == null || y1 == null || x2 == null || y2 == null) {
				var x1 = crop_padding;
				var y1 = crop_padding;
				var x2 = image_display_width - crop_padding;
				var y2 = image_display_height - crop_padding;
			}

			$('#uploaded_image').Jcrop({
				onSelect: update_coords,
				onChange: update_coords,
				bgColor: 'black',
				bgOpacity: 0.25,
				aspectRatio: aspect_ratio,
				setSelect: [x1,y1,x2,y2]
			});			
			
		} else {
			$('#object_status').val('a');
			var datastring = 'image_hash='+image_hash_id+'&image_crop_id='+image_crops[image_crop][3]+'&crop_width='+max_display_width;
			$('#modal_manage_images .loading_icon').fadeIn(250);
			$.ajax({
				url: '/ajax/image/cropcoords',
				type: 'post',
				dataType: 'json',
				data: datastring,
				success: function(d) {
					$('#modal_manage_images .loading_icon').fadeOut(250);
					x1 = parseInt(d['x1']);
					y1 = parseInt(d['y1']);
					x2 = parseInt(d['x2']);
					y2 = parseInt(d['y2']);
					
					if (x1 == 0 && y1 == 0 && x2 == 0 && y2 == 0) {
						if (aspect_ratio != 0) {
							if (image_display_width == image_display_height && aspect_ratio == 1) {
								
							} else {
								if (aspect_ratio < image_aspect) {
									x1 = Math.round((image_display_width - (image_display_height * aspect_ratio)) / 2);
									y1 = 0;
									x2 = image_display_width - x1;
									y2 = image_display_height;
								} else {
									x1 = 0;
									y1 = Math.round((image_display_height - (image_display_width / aspect_ratio)) / 2);
									x2 = image_display_width;
									y2 = image_display_height - y1;
								}
							}		
						} else {
							x1 = crop_padding;
							y1 = crop_padding;
							x2 = image_display_width - crop_padding;
							y2 = image_display_height - crop_padding;
						}
					}
					
					$('#uploaded_image').Jcrop({
						onSelect: update_coords,
						onChange: update_coords,
						bgColor: 'black',
						bgOpacity: 0.25,
						aspectRatio: aspect_ratio,
						setSelect: [x1,y1,x2,y2]
					});
				},
				error: function() {
					$('#modal_manage_images .loading_icon').fadeOut(250);
					alert('An error occured, please try again');
				}
			});
		}
		
		if ((image_crop) >= (image_crops.length - 1)) {
			$('#image_crop_button').val('Crop & Finish');
		} else {
			$('#image_crop_button').val('Crop');
		}
		
		if (image_crop == 0) {
			original_image_id = $('#uploaded_image').attr('image_id');
		}
		
		$('#manage_images_title').html('Crop '+ucwords(image_crops[image_crop][0])+' Image');
		$('#upload_area').show();
		$('#image_crop_form').show();
		$('#image_crop_button').show();
		scroll_top();
	}
}

function update_coords(coords) {
    $('#crop_x').val(coords.x);
    $('#crop_y').val(coords.y);
    $('#crop_w').val(coords.w);
    $('#crop_h').val(coords.h);
}

function check_coords() {
    if (parseInt($('#crop_w').val())) return true;
    alert('Please select a crop region');
    return false;
}

// Image upload scripts
function $m(theVar){
	return document.getElementById(theVar)
}
function remove(theVar){
	var theParent = theVar.parentNode;
	theParent.removeChild(theVar);
}
function addEvent(obj, evType, fn){
	if(obj.addEventListener)
	    obj.addEventListener(evType, fn, true)
	if(obj.attachEvent)
	    obj.attachEvent("on"+evType, fn)
}
function removeEvent(obj, type, fn){
	if(obj.detachEvent){
		obj.detachEvent('on'+type, fn);
	}else{
		obj.removeEventListener(type, fn, false);
	}
}
function isWebKit(){
	return RegExp(" AppleWebKit/").test(navigator.userAgent);
}
function ajaxUpload(form,url_action,id_element,html_show_loading,html_error_http){
	var detectWebKit = isWebKit();
	form = typeof(form)=="string"?$m(form):form;
	var erro="";
	if(form==null || typeof(form)=="undefined"){
		erro += "The form of 1st parameter does not exists.\n";
	}else if(form.nodeName.toLowerCase()!="form"){
		erro += "The form of 1st parameter its not a form.\n";
	}
	if($m(id_element)==null){
		erro += "The element of 3rd parameter does not exists.\n";
	}
	if(erro.length>0){
		alert("Error in call ajaxUpload:\n" + erro);
		return;
	}
	var iframe = document.createElement("iframe");
	iframe.setAttribute("id","ajax-temp");
	iframe.setAttribute("name","ajax-temp");
	iframe.setAttribute("width","0");
	iframe.setAttribute("height","0");
	iframe.setAttribute("border","0");
	iframe.setAttribute("style","width: 0; height: 0; border: none;");
	form.parentNode.appendChild(iframe);
	window.frames['ajax-temp'].name="ajax-temp";
	var doUpload = function(){
		removeEvent($m('ajax-temp'),"load", doUpload);		
		var cross = "javascript: ";
		cross += "window.parent.$m('"+id_element+"').innerHTML = document.body.innerHTML; window.parent.enable_image_crop(0); void(0);";
		$m(id_element).innerHTML = html_error_http;
		$m('ajax-temp').src = cross;
		if(detectWebKit){
        	remove($m('ajax-temp'));
        }else{
        	setTimeout(function(){ remove($m('ajax-temp'))}, 250);
        }
    };
	addEvent($m('ajax-temp'),"load", doUpload);
	form.setAttribute("target","ajax-temp");
	form.setAttribute("action",url_action);
	form.setAttribute("method","post");
	form.setAttribute("enctype","multipart/form-data");
	form.setAttribute("encoding","multipart/form-data");
	if(html_show_loading.length > 0){
		$m(id_element).innerHTML = html_show_loading;
	}
	form.submit();
}

function add_related_image(article_id, image_hash) {
	
	var datastring = 'article_id='+article_id+'&image_hash='+image_hash;
	$.ajax({
		url: '/ajax/post/article/image',
		type: 'post',
		dataType: 'json',
		data: datastring,
		success: function(data) {			
			enable_related_image_select();
		},
		error: function(data) {
			alert('An error occured, please try again');
		}
	});
}