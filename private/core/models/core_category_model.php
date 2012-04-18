<?php
class Core_Category_Model extends Core_Model {

	protected static $table_name = 'categories';
	protected static $db_fields = array(
		'id',
		'title',
		'status'
	);

	protected $id;
	protected $title;
	protected $status;

	function __construct() {
		parent::__construct();
	}

	public function get_id() {
		return $this->id;
	}

	public function set_id($id) {
		$this->id = $id;
	}

	public function get_title() {
		return $this->title;
	}

	public function set_title($title) {
		$this->title = $title;
	}

	public function get_status() {
		return $this->status;
	}

	public function set_status($status) {
		$this->status = $status;
	}

}
?>