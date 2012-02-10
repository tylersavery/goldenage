<?php
class Ajax_Post_Category_Controller extends Ajax_Post_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
	}

	function content_view() {

		if(isset($_POST['id'])) { $id = $_POST['id']; }
		if(isset($_POST['title'])) { $title = $_POST['title']; }

		if(is_numeric($id) && $id > 0) {
			$category = Category_Model::find_by_id($id);
		} else {
			$category = new Category_Model();
		}

		if(isset($title)) { $category->set_title($title); }

		if($category->save()) {
			return $category->get_id();
		}

	}
	
}
?>