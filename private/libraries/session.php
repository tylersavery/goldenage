<?php

class Session {
	
	private $id;
	private $logged_in;
	private $type;
		
	function __construct() {
		session_start();
		$this->check_login();
	}
	
	public function get_id() {
		return $this->id;
	}
	
	public function get_type() {
		return $this->type;
	}
	
	public function is_logged_in() {
		return $this->logged_in;
	}
	
	public function login($user) {
		if($user) {
			$this->id = $_SESSION['id'] = $user->get_id();
			$this->type = $_SESSION['level'] = $user->get_type();
			$this->logged_in = true;
		}
	}
	
	public function logout() {
		unset($_SESSION['id']);
		unset($_SESSION['level']);
		unset($this->id);
		$this->logged_in = false;
	}
	
	private function check_login() {
		if(isset($_SESSION['id']) && isset($_SESSION['level'])) {
			$this->id = $_SESSION['id'];
			$this->level = $_SESSION['level'];
			$this->logged_in = true;
		} else {
			unset($this->id);
			$this->logged_in = false;
		}
	}
}

$session = new Session();

?>