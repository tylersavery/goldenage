<?php
class Admin_Category_Controller extends Admin_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Users';
        $this->js_head[] = '/js/ajax/ajax_post_category.js';
        
        $this->header_view->active_link = 'categories';
    }
    
    protected function content_view() {
        $categories = Category_Model::find_all();
        $this->content_view->categories = $categories;
        return $this->content_view->capture('admin_categories_view.php');
    }
    
}
?>