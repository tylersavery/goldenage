<?php
class Admin_Category_Edit_Controller extends Admin_Category_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Edit';
    }
    
    protected function content_view() {
        if (isset($this->data['category_id'])) {
            $category = Category_Model::find_by_id($this->data['category_id']);
            $this->content_view->category = $category;
        } else {
            redirect_to('/admin/categories');
        }
        return $this->content_view->capture('admin_category_view.php');
    }
    
}
?>