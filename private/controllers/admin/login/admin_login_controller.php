<?php
class Admin_Login_Controller extends Admin_Controller {
    
    function __construct($uri, $data) {
        $this->validate_login();
        parent::__construct($uri, $data);
        $this->title .= ' | Login';
    }
    
    protected function content_view() {
        $this->content_view->notices = $this->notices;
        return $this->content_view->capture('admin_login_view.php');
    }
    
    protected function header_view() {
        return;   
    }
    
}
?>