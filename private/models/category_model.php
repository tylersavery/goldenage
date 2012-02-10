<?php
class Category_Model extends Core_Category_Model {
    
    function __construct() {
		parent::__construct();
	}

	public static function find_by_slug($slug) {
		$result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE title = '".slug_to_title($slug)."'");
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	
	
    
}
?>