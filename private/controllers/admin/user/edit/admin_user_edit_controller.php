<?php
class Admin_User_Edit_Controller extends Admin_User_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Edit';
    }
    
    protected function content_view() {
        if (isset($this->data['user_id'])) {
            $user = User_Model::find_by_id($this->data['user_id']);
            $this->content_view->this_user = $user;
        } else {
            redirect_to('/admin/users');
        }
        return $this->content_view->capture('admin_user_view.php');
    }
    
}
?>