<?php
class Core_Image_Model extends Core_Model {

	protected static $table_name = 'images';
	protected static $db_fields = array(
		'id',
		'image_crop_id',
		'image_hash',
		'file_name',
		'file_type',
		'file_size',
		'file_w',
		'file_h',
		'crop_x1',
		'crop_y1',
		'crop_x2',
		'crop_y2',
		'time_create',
		'time_update',
		'status'
	);

	protected $id;
	protected $image_crop_id;
	protected $image_hash;
	protected $file_name;
	protected $file_type;
	protected $file_size;
	protected $file_w;
	protected $file_h;
	protected $crop_x1;
	protected $crop_y1;
	protected $crop_x2;
	protected $crop_y2;
	protected $time_create;
	protected $time_update;
	protected $status;

	function __construct() {
		parent::__construct();
	}

	public function get_id() {
		return $this->id;
	}
	
	public function get_image_crop_id() {
		return $this->image_crop_id;
	}

	public function set_image_crop_id($image_crop_id) {
		$this->image_crop_id = $image_crop_id;
	}
	
	public function get_image_hash() {
		return $this->image_hash;
	}

	public function set_image_hash($image_hash) {
		$this->image_hash = $image_hash;
	}
	
	public function get_file_name() {
		return $this->file_name;
	}

	public function set_file_name($file_name) {
		$this->file_name = $file_name;
	}

	public function get_file_type() {
		return $this->file_type;
	}

	public function set_file_type($file_type) {
		$this->file_type = $file_type;
	}	
	
	public function get_file_size() {
		return $this->file_size;
	}

	public function set_file_size($file_size) {
		$this->file_size = $file_size;
	}

	public function get_file_w() {
		return $this->file_w;
	}

	public function set_file_w($file_w) {
		$this->file_w = $file_w;
	}

	public function get_file_h() {
		return $this->file_h;
	}

	public function set_file_h($file_h) {
		$this->file_h = $file_h;
	}
	
	public function get_crop_x1() {
		return $this->crop_x1;
	}
	
	public function set_crop_x1($crop_x1) {
		$this->crop_x1 = $crop_x1;
	}
	
	public function get_crop_y1() {
		return $this->crop_y1;
	}
	
	public function set_crop_y1($crop_y1) {
		$this->crop_y1 = $crop_y1;
	}
	
	public function get_crop_x2() {
		return $this->crop_x2;
	}
	
	public function set_crop_x2($crop_x2) {
		$this->crop_x2 = $crop_x2;
	}
	
	public function get_crop_y2() {
		return $this->crop_y2;
	}
	
	public function set_crop_y2($crop_y2) {
		$this->crop_y2 = $crop_y2;
	}

	public function get_time_create() {
		return $this->time_create;
	}

	public function set_time_create($time_create) {
		$this->time_create = $time_create;
	}

	public function get_time_update() {
		return $this->time_update;
	}

	public function set_time_update($time_update) {
		$this->time_update = $time_update;
	}
	
	public function get_status() {
		return $this->status;
	}
	
	public function set_status($status) {
		$this->status = $status;
	}

}
?>