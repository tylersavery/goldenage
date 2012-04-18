<?php
class Admin_Comment_Edit_Controller extends Admin_Comment_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
		$this->title .= ' | Edit';

		if (is_numeric($data['comment_id'])) {
			$comment = Comment_Model::find_by_id($data['comment_id']);
			if($comment == null){ redirect_to('/admin/comments');}
			$this->content_view->comment = $comment;
		} else {
			$this->content_view->comment = new Comment_Model;
		}

	}

	protected function content_view() {
		return $this->content_view->capture('admin_comment_view.php');
	}
}
?>