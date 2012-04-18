<?php
class Admin_Category_Add_Controller extends Admin_Category_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Add';
    }
    
    protected function content_view() {
        return $this->content_view->capture('admin_category_view.php');
    }
    
}
?>