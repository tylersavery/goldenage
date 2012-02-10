<?php
class Core_Model {

	protected static $table_name;
	protected static $db_fields;

	function __construct() {
		
	}
	
	public static function get_db_fields() {
		return static::$db_fields;
	}

	public static function count_all() {
		global $database;
		$sql = "SELECT COUNT(*) FROM ".static::$table_name;
		$result = $database->fetch_array($database->query($sql));
		return $result[0];
	}

	public static function count_all_by_sql($sql) {
		global $database;
		$result = $database->fetch_array($database->query($sql));
		return $result[0];
	}	
	
	public static function find_all() {
		return static::find_by_sql("SELECT * FROM ".static::$table_name);
	}
	
	public static function find_all_desc() {
		return static::find_by_sql("SELECT * FROM ".static::$table_name . " ORDER BY id DESC");
	}
	
	public static function find_by_id($id = null) {
		if (is_null($id)) { return false; }
		$result_array = static::find_by_sql("SELECT * FROM ".static::$table_name." WHERE id = {$id} LIMIT 1");
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	
	public static function find_all_by_attributes($attributes, $selectors = null) {
		if (! is_null($selectors)) {
			$selector = implode(',', $selectors);
		} else {
			$selector = '*';
		}
		$sql = "SELECT " . $selector . " FROM ".static::$table_name." ";
		$sql .= "WHERE ";
		$i = 0;
		foreach ($attributes as $key=>$value) {
			$value = htmlentities($value);
			if (is_numeric($value)) {
				$sql .= "{$key} = {$value} ";
			} else {
				$sql .= "{$key} = \"{$value}\" ";	
			}
			if ($i != (sizeof($attributes)-1)) $sql .= "AND ";
			$i++;
		}
		$result_array = static::find_by_sql($sql);
		return !empty($result_array) ? $result_array : false;
	}
	
	public static function find_by_attributes($attributes, $selectors = null) {
		$result_array = static::find_all_by_attributes($attributes, $selectors);
		return !empty($result_array) ? array_shift($result_array) : false;
	}
	
	public static function find_by_sql($sql="") {
		global $database;
		$result_set = $database->query($sql);
		$object_array = array();
		while ($row = $database->fetch_array($result_set)) {
			$object_array[] = static::instantiate($row);
		}
		return $object_array;
	}
	
	protected static function instantiate($record) {
		$class_name = get_called_class();
		$object = new $class_name;
		foreach($record as $attribute=>$value) {
			if($object->has_attribute($attribute)) {
				$object->$attribute = $value;
			}
		}
		return $object;
	}
	
	private function has_attribute($attribute) {
		$object_vars = $this->attributes();
		return array_key_exists($attribute, $object_vars);
	}
	
	protected function attributes() {
		$attributes = array();
		foreach(static::$db_fields as $field) {
			if(property_exists($this, $field))
				$attributes[$field] = $this->$field;
		}
		return $attributes;
	}
	
	protected function sanitized_attributes() {
		global $database;
		$clean_attributes = array();
		foreach($this->attributes() as $key => $value) {
			if (is_null($value)) {
				$clean_attributes[$key] = null;
			} else {
				$clean_attributes[$key] = $database->escape_value($value);
			}
		}
		return $clean_attributes;
	}
	
	public function save() {
		return isset($this->id) ? $this->update() : $this->create();
	}
	
	protected function create() {
		global $database;
		$attributes = $this->sanitized_attributes();
		
		$sql  = "INSERT INTO " . static::$table_name . " (";
		$sql .= join(", ", array_keys($attributes));
		$sql .= ") VALUES (";
		
		foreach ($attributes as $key => $attribute) {
			if (is_null($attribute)) {
				$attributes[$key] = 'null';
			} else {
				$attributes[$key] = "'" . $attributes[$key] . "'";
			}
		}
		
		$sql .= join(", ", array_values($attributes));
		$sql .= ")";
		
		if($database->query($sql)) {
			$this->id = $database->insert_id();
			return true;	
		} else {
			return false;
		}
	}
	
	protected function update() {
		global $database;
		$attributes = $this->sanitized_attributes();
		
		foreach($attributes as $key => $value) {
			if (is_null($value)) {
				$attributes_pairs[] = "{$key}=null";
			} else {
				$attributes_pairs[] = "{$key}='{$value}'";
			}
		}
		
		$sql  = "UPDATE " . static::$table_name . " SET ";
		$sql .= join(", ", $attributes_pairs);
		$sql .= " WHERE id=" . $database->escape_value($this->id);
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}
	
	public function delete() {
		global $database;
		$sql  = "DELETE FROM " . static::$table_name;
		$sql .= " WHERE id='" . $database->escape_value($this->id);
		$sql .= "' LIMIT 1";
		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}

	public static function delete_all() {
		global $database;
		$sql  = "DELETE FROM " . static::$table_name;
		$database->query($sql);
		return ($database->affected_rows()) ? true : false;
	}
	
}
?>