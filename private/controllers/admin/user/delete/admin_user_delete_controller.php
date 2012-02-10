<?php
class Admin_User_Delete_Controller extends Admin_User_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Delete';
    }
    
    protected function content_view() {
        if (isset($this->data['user_id'])) {
            $user = User_Model::find_by_id($this->data['user_id']);
            $user->delete();
        }
        redirect_to('/admin/users');
    }
    
}
?>