$(document).ready(function() {
	$("#submit_article_button").click(function() {
		submit_article_form();
	});
	$('#time_publish').datetimepicker();
});

function submit_article_form() {
		
	if ($('#title').val() == '') {
		alert('You must enter a title for this article.');
		return false;
	}
	if ($('#author_id').val() == '0') {
		alert('You must select an author to save this article.');
		return false;
	}
	if ($('#time_publish').val() == '') {
		alert('You must select a publish date and time.');
		return false;
	}
	
	generateSlug();
	
	var tinymce_content = tinyMCE.get('body').getContent();	
	$("#body").val(tinymce_content);
	
	var datastring = $("#article_form").serialize();
	//$("#submit_article_button").attr("disabled", "disabled");
	
	debug(datastring);
	
	$.ajax({
		url: "/ajax/post/article",
		type: "post",
		data: datastring,
		success: function(data) {
			
			debug(data);
			
			alert("The article was successfully saved.");
			//window.location = '/admin/articles';
		}
	});
	return true;
}