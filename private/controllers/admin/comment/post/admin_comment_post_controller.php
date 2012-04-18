<?php

class Admin_Comment_Post_Controller extends Admin_Comment_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
		$this->title = null;
	}

	function content_view() {

		global $session;

		if(isset($_POST['id'])) { $id = $_POST['id']; }
		if(isset($_POST['article_id'])) { $article_id = $_POST['article_id']; }
		if(isset($_POST['user_name'])) { $user_name = $_POST['user_name']; }
		if(isset($_POST['user_email'])) { $user_email = $_POST['user_email']; }
		if(isset($_POST['user_comment'])) { $user_comment = $_POST['user_comment']; }
		if(isset($_POST['user_webiste'])) { $user_webiste = $_POST['user_webiste']; }
		if(isset($_POST['image'])) { $image = $_POST['image']; }
		if(isset($_POST['entry_datetime'])) { $entry_datetime = $_POST['entry_datetime']; }

		if(is_numeric($id) && $id > 0) {
			$comment = Comment_Model::find_by_id($id);
		} else {
			$comment = new Comment_Model();
		}

		if(isset($article_id)) { $comment->set_article_id($article_id); }
		if(isset($user_name)) { $comment->set_user_name($user_name); }
		if(isset($user_email)) { $comment->set_user_email($user_email); }
		if(isset($user_comment)) { $comment->set_user_comment($user_comment); }
		if(isset($user_webiste)) { $comment->set_user_webiste($user_webiste); }
		if(isset($image)) { $comment->set_image($image); }
		if(isset($entry_datetime)) { $comment->set_entry_datetime($entry_datetime); }

		$comment->save();

		$this->add_flash('Comment Saved Successfully');
		redirect_to('/admin/comments');
	}
}
?>