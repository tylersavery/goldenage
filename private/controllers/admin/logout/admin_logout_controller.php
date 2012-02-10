<?php
class Admin_Logout_Controller extends Static_Base_Controller {
    
    function __construct($uri, $data) {
        $this->logout_user();
    }
    
    private function logout_user() {
        global $session;
        $session->logout();
        redirect_to('/admin/login');
    }
    
}
?>