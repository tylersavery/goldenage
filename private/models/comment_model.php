<?php
class Comment_Model extends Core_Comment_Model {

	function __construct() {
		parent::__construct();
	}
	
	public function get_friendly_date($format = "F jS, Y g:i a"){
		return date($format, $this->get_entry_datetime());
	}

}
?>