<?php
class Admin_Comment_Controller extends Admin_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
		$this->title .= ' | Comments';
	}

	protected function content_view() {
		$comments = Comment_Model::find_all();
		$this->content_view->comments = $comments;

		return $this->content_view->capture('admin_comments_view.php');
	}

}
?>