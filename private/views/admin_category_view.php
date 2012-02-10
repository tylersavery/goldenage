<?php
if($this->category) {
	$id = $this->category->get_id();
	$title = $this->category->get_title();
	$status = $this->category->get_status();
}
?>

<h1 class="title">Edit Category</h1>
	
<form name="category_form" id="category_form">
	<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />

	<h3>Title</h3>
	<input type="text" id="title" name="title" value="<?php echo $title;?>" /><br />

	
</form>

<div class="actions">
	<div class="action_buttons">
		<a href="/admin/categories" class="btn">Back</a>
		<button type="button" id="submit_category_button" name="submit_category_button" class="btn primary">Save Category</button>
	</div>
</div>