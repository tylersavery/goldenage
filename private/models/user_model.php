<?php
class User_Model extends Core_User_Model {
    
    function __construct() {
		parent::__construct();
	}    
    
    public static function authenticate($email = "", $password = "") {
        global $database;
        $email = $database->escape_value($email);
        $password = md5(DB_SALT.$database->escape_value($password));
        $sql  = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE email = '{$email}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $result_array = static::find_by_sql($sql);
        return !empty($result_array) ? array_shift($result_array) : false;
    }
    
    public function get_full_name() {
        return ucwords($this->first_name . ' ' . $this->last_name);
    }
	
	public function get_short_name() {
        return ucwords($this->first_name[0] . '. ' . $this->last_name);
    }    
    
	
	
	public function get_friendly_status() {
		
		switch($this->status) {
			case "a":
				return "Active";
				break;
			case "d":
				return "Deleted";
				break;
			case "p":
				return "Disabled";
				break;
		}
		
		return '';
	}

}

?>