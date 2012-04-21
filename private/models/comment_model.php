<?php
class Comment_Model extends Core_Comment_Model {

	function __construct() {
		parent::__construct();
	}
	
	
	public function get_friendly_date($format = "F jS, Y g:i a"){
		return date($format, $this->get_entry_datetime());
	}
	
	public function get_article(){
		
		$article = Article_Model::find_by_id($this->get_article_id());
	
		
		return $article;
	}

}
?>