<?php
class Core_Imagecrop_Model extends Core_Model {

	protected static $table_name = 'image_crops';
	protected static $db_fields = array(
		'id',
		'name',
		'aspect_ratio',
		'width'
	);

	protected $id;
	protected $name;
	protected $aspect_ratio;
	protected $width;

	function __construct() {
		parent::__construct();
	}

	public function get_id() {
		return $this->id;
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public function get_name() {
		return $this->name;
	}

	public function set_name($name) {
		$this->name = $name;
	}

	public function get_aspect_ratio() {
		return $this->aspect_ratio;
	}

	public function set_aspect_ratio($aspect_ratio) {
		$this->aspect_ratio = $aspect_ratio;
	}

	public function get_width() {
		return $this->width;
	}

	public function set_width($width) {
		$this->width = $width;
	}

}
?>