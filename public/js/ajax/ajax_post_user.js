$(document).ready(function() {
	$("#submit_user_button").click(function() {
		submit_user_form();
	});
});

function submit_user_form() {
	$("#submit_user_button").attr("disabled", "disabled");
	var datastring = $("#user_form").serialize();

	$.ajax({
		url: "/ajax/post/user",
		type: "post",
		data: datastring,
		success: function(d) {
			alert("Saved!");
			
			window.location = "/admin/users";
				
		}
	});
}