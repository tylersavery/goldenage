$(document).ready(function() {
	$("#submit_category_button").click(function() {
		submit_category_form();
	});
});

function submit_category_form() {
	$("#submit_category_button").attr("disabled", "disabled");
	var datastring = $("#category_form").serialize();

	$.ajax({
		url: "/ajax/post/category",
		type: "post",
		data: datastring,
		success: function(d) {
			alert("Saved!");

			window.location = "/admin/categories";

		}
	});
}