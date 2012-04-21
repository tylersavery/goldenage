<?php
global $session;
if(isset($this->article)) {
	$id = $this->article->get_id();
	$user_id = $this->article->get_user_id();
	$category_id = $this->article->get_category_id();
	$title = $this->article->get_title();
	$subtitle = $this->article->get_subtitle();
	$body = $this->article->get_body();
	$slug = $this->article->get_slug();
	$tags = $this->article->get_tags();
	$twitter_message =  $this->article->get_twitter_message();
	$facebook_message = $this->article->get_facebook_message();
	$time_create = $this->article->get_time_create();
	$time_update = $this->article->get_time_update();
	$time_publish = date('m/d/Y', $this->article->get_time_publish());
	$status = $this->article->get_status();
	
	$image_hash = $this->article->get_image_hash();
	$original_image = $this->article->get_original_image();
	$main_image = $this->article->get_main_image();
	$thumbnail_image = $this->article->get_thumbnail_image();
	
	$page_title = 'Edit Article';
} else {
	$id = null;
	$user_id = $session->get_id();
	$category_id = null;
	$title = null;
	$subtitle = null;
	$body = null;
	$slug = null;
	$tags = null;
	$twitter_message = null;
	$facebook_message = null;
	$time_create = null;
	$time_update = null;
	$time_publish = date('m/d/Y H:s', time());
	$status = null;
	
	$image_hash = null;
	$original_image = null;
	$main_image = null;
	$thumbnail_image = null;
	
	$page_title = 'New Article';
}
$type = $this->user->get_type();

?>
<form onsubmit="javascript: generateSlug();" name="article_form" id="article_form">
	<h1 class="title"><?= $page_title ?></h1>
	<input type="hidden" id="id" name="id" value="<?php echo $id;?>" />
	<div class="row">		
		<div class="span8">
			<h3>Title</h3>
			<input type="text" id="title" onkeydown="javascript: generateSlug(); updateCount(this);" onchange="javascript: generateSlug(); updateCount(this);" name="title" value="<?php echo $title;?>" /><br />
			
			<h3>Subtitle</h3>
			<textarea id="subtitle" name="subtitle" onchange="javascript: updateCount(this);" onkeydown="javascript: updateCount(this);"><?php echo $subtitle;?></textarea><br />
			
			<h3>Slug</h3>
			<input type="text" id="slug" name="slug" value="<?php echo $slug;?>" /><br />

			<h3>Author</h3>
			<select id="user_id" name="user_id">
				<option value="0">Select Author</option>
				<?php foreach($this->users as $user): ?>
					<option value="<?php echo $user->get_id();?>" <?php if($user->get_id() == $user_id) echo 'selected="selected"';?>><?php echo $user->get_full_name(); ?></option>
				<?php endforeach; ?>
			</select>
			
			<h3>Tags</h3>
			<input type="text" id="tags" name="tags" value="<?= $tags;?>" /><br />
			
		</div>	

		<div class="span4">
			<h3>Publish Time</h3>
			<input type="text" class="datepicker" id="time_publish" name="time_publish" value="<?php echo $time_publish;?>" /><br />
		
			<h3>Status</h3>
			<?php if ($type >= 5): ?>
			<select name="status" id="status">
				<option value="a"<?php if($status == 'a'): echo ' selected="selected" '; endif;?>>Active</option>	
				<option value="p"<?php if($status == 'p'): echo ' selected="selected" '; endif;?>>Draft</option>
			</select>
			<?php else: ?>
				<?php echo $this->article->get_friendly_status(); ?>
			<?php endif; ?>
			<br />
				
			<h3>Category</h3>
			<select id="category_id" name="category_id">
				<option value="0">Select Catagory</option>
				<?php foreach($this->categories as $category): ?>
					<option value="<?php echo $category->get_id();?>" <?php if($category->get_id() == $category_id) echo 'selected="selected"';?>><?php echo $category->get_title(); ?></option>
				<?php endforeach; ?>
			</select>
			
			<h3>Facebook Message</h3>
			<textarea id="facebook_message" name="facebook_message" onchange="" onkeydown=""><?php echo $facebook_message;?></textarea><br />
			
			<h3>Twitter Message</h3>
			<textarea id="twitter_message" name="twitter_message" onchange="" onkeydown=""><?php echo $twitter_message;?></textarea><br />
			
			<h3>Images</h3>
				
			<div id="article_thumbnail">
				<?php if (!empty($image_hash) && !empty($thumbnail_image)): ?>
					<img src="<?php echo IMAGE_ROOT.'uploads/'.$thumbnail_image->get_file_name(); ?>" />
				<?php else: ?>
					No Image
				<?php endif; ?>
			</div>
			<p>
			<button id="manage_images_button" data-controls-modal="modal_manage_images" data-backdrop="static" data-keyboard="false" class="btn modal_btn" />Select Image</button>
			</p>
			
		
			
		</div>
	</div>
	<hr class="wide_900px" />
	<h3>Body</h3>
	<textarea id="body" name="body"><?php echo $body;?></textarea><br />
	<input id="tinymce_pigeonimage" data-controls-modal="modal_manage_images" data-backdrop="static" data-keyboard="false" class="modal_btn display_none" />
	
	
	<input type="hidden" id="image_hash" name="image_hash" value="<?php echo $image_hash; ?>" />
</form>
<br />
<div class="actions">
	<div class="action_buttons">
	<?php if ($slug != ''): ?>
	<a target="_blank" href="/article/<?php echo $slug; ?>" class="btn view_article">View Article</a>
	<?php endif; ?>
	<a href="/admin/articles" class="btn">Back</a>
	<button class="btn primary loader" id="submit_article_button" name="submit_article_button">Save Article</button>
	</div>
</div>