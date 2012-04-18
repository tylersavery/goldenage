<?php
if($this->comment) {
	$id = $this->comment->get_id();
	$article_id = $this->comment->get_article_id();
	$user_name = $this->comment->get_user_name();
	$user_email = $this->comment->get_user_email();
	$user_comment = $this->comment->get_user_comment();
	$user_webiste = $this->comment->get_user_webiste();
	$image = $this->comment->get_image();
	$entry_datetime = $this->comment->get_entry_datetime();
}
?>

	<form name="comment_form" method="post" action="/admin/comment/post" id="comment_form">
		<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />

		<h3>Article</h3>
		<input type="text" id="article_id" name="article_id" value="<?php echo $article_id;?>" />

		<h3>Name</h3>
		<input type="text" id="user_name" name="user_name" value="<?php echo $user_name;?>" />

		<h3>Email</h3>
		<input type="text" id="user_email" name="user_email" value="<?php echo $user_email;?>" />

		<h3>Comment</h3>
		<textarea id="user_comment" name="user_comment"><?php echo $user_comment;?></textarea>
		<h3>Website</h3>
		<input type="text" id="user_webiste" name="user_webiste" value="<?php echo $user_webiste;?>" />

		<h3>Image</h3>
		<input type="text" id="image" name="image" value="<?php echo $image;?>" />

		<h3>Date</h3>
		<input type="text" id="entry_datetime" name="entry_datetime" value="<?php echo $entry_datetime;?>" />

		<div class="actions">
			<div class="action_buttons">
				<a href="/admin/comments" class="btn">Back</a>
				<input id="submit_comment" type="submit" class="btn primary" value="Save" />
			</div>
		</div>
	</form>

