<?php
class Admin_Comment_Add_Controller extends Admin_Comment_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
		$this->title .= ' | Add';
	}

	protected function content_view() {
		return $this->content_view->capture('admin_comment_view.php');
	}
}
?>