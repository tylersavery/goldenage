<?php
class Ajax_Post_User_Controller extends Ajax_Post_Controller {

	function __construct($uri, $data) {
		parent::__construct($uri, $data);
	}

	function content_view() {

		if(isset($_POST['id'])) { $id = $_POST['id']; }
		if(isset($_POST['email'])) { $email = $_POST['email']; }
		if(isset($_POST['password'])) { $password = $_POST['password']; }
		if(isset($_POST['first_name'])) { $first_name = $_POST['first_name']; }
		if(isset($_POST['last_name'])) { $last_name = $_POST['last_name']; }
		if(isset($_POST['bio'])) { $bio = $_POST['bio']; }
		if(isset($_POST['status'])) { $status = $_POST['status']; }
		if(isset($_POST['type'])) { $type = $_POST['type']; }
		
		if(is_numeric($id) && $id > 0) {
			$user = User_Model::find_by_id($id);
		} else {
			$user = new User_Model();
		}

		if(isset($email)) { $user->set_email($email); }
		if(isset($password)) {$user->set_password(MD5(DB_SALT . $password));}
		if(isset($first_name)) { $user->set_first_name($first_name); }
		if(isset($last_name)) { $user->set_last_name($last_name); }
		if(isset($bio)) { $user->set_bio($bio); }
		if(isset($time_create)) { $user->set_time_create($time_create); }
		if(isset($time_update)) { $user->set_time_update($time_update); }
		if(isset($status)) { $user->set_status($status); }
		if(isset($type)) { $user->set_type($type); }
		
		if($user->save()) {
			return $user->get_id();
		} else {
			return $user->get_id();
		}

	}
}
?>