<?php
class Admin_Article_Edit_Controller extends Admin_Article_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Edit';
    }
    
    protected function content_view() {
        if (isset($this->data['article_id'])) {
            $article = Article_Model::find_by_id($this->data['article_id']);
        } else if (isset($this->data['slug'])) {
            $article = Article_Model::find_by_attributes(array('slug' => $this->data['slug']));
        }

        if (empty($article)) redirect_to('/admin/articles');

        $users = User_Model::find_all();
        $categories = Category_Model::find_all();
        
        $this->content_view->article = $article;
        $this->content_view->users = $users;
        $this->content_view->categories = $categories;
        
        return $this->content_view->capture('admin_article_view.php');
    }
    
    
    
    
}
?>