<?php

class Admin_Comment_Delete_Controller extends Admin_Comment_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
		$this->title = null;

		$comment = Comment_Model::find_by_id($data['comment_id']);
		$comment->delete();
		redirect_to('/admin/comments');
	}

	function content_view() {

	}
}
?>