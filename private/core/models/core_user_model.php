<?php
class Core_User_Model extends Core_Model {

	protected static $table_name = 'users';
	protected static $db_fields = array(
		'id',
		'email',
		'password',
		'type',
		'first_name',
		'last_name',
		'bio',
		'last_login',
		'time_create',
		'time_update',
		'status',
	);

	protected $id;
	protected $email;
	protected $password;
	protected $first_name;
	protected $last_name;
	protected $bio;
	protected $last_login;
	protected $time_create;
	protected $time_update;
	protected $type;
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

	public function get_email() {
		return $this->email;
	}

	public function set_email($email) {
		$this->email = $email;
	}
	
	public function get_bio() {
		return $this->bio;
	}

	public function set_bio($bio) {
		$this->bio = $bio;
	}
	
	public function get_type() {
		return $this->type;
	}

	public function set_type($type) {
		$this->type = $type;
	}

	public function get_password() {
		return $this->password;
	}

	public function set_password($password) {
		$this->password = $password;
	}

	public function get_first_name() {
		return $this->first_name;
	}

	public function set_first_name($first_name) {
		$this->first_name = $first_name;
	}

	public function get_last_name() {
		return $this->last_name;
	}

	public function set_last_name($last_name) {
		$this->last_name = $last_name;
	}

	public function get_last_login() {
		return $this->last_login;
	}

	public function set_last_login($last_login) {
		$this->last_login = $last_login;
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