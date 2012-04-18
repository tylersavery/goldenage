<?php
class Admin_Article_Add_Controller extends Admin_Article_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Add';
    }
    
    protected function content_view() {
        
        $users = User_Model::find_all();
        $categories = Category_Model::find_all();
        
        $this->content_view->users = $users;
        $this->content_view->categories = $categories;      
        
        return $this->content_view->capture('admin_article_view.php');
        
    }
    
}
?>