<?php
class Admin_User_Add_Controller extends Admin_User_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Add';
    }
    
    protected function content_view() {
        return $this->content_view->capture('admin_user_view.php');
    }
    
}
?>