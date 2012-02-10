$(document).ready(function() {	
	
	$('#modal_delete_user').bind('show', function () {
		reset_delete_user_modal();
	});
	
	$('#modal_delete_user').click(function() {
		alert('YO!');
	});

	$('#modal_delete_user .close').click(function() {
		$('#modal_delete_user').modal('hide');
	});
	
	$(window).keyup(function(e) {
		var code = (e.keyCode ? e.keyCode : e.which);
		e.preventDefault();
		if($('#modal_delete_user').is(":visible")) {
			switch(code) {
				case KEYCODE_ESC:
					$('#modal_delete_user').modal('hide');
					break;
				case KEYCODE_ENTER:
					$('#modal_delete_user').click();
					break;	
			}
		}
	});
	
	$('#modal_delete_user #modal_back_button').click(function() {
		$('#modal_delete_user').modal('hide');
	});
	
});

function reset_delete_user_modal() {
	enable_delete_user();
}

function disable_delete_user_modal() {
	$('#modal_manage_dailycable .modal_action').hide();
}

function enable_delete_user() {
	disable_delete_user_modal();
	$('#manage_delete_user_title').html('Delete User');
	$('#delete_user_apply_button').show();
	scroll_top();
}