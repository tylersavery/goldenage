<?php
class Admin_Category_Delete_Controller extends Admin_Category_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Delete';
    }
    
    protected function content_view() {
        if (isset($this->data['category_id'])) {
            $category = Category_Model::find_by_id($this->data['category_id']);
            $category->delete();
        }
        redirect_to('/admin/categories');
    }
    
}
?>