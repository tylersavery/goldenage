<?php
class Admin_Article_Delete_Controller extends Admin_Article_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Delete';
        
        if (isset($this->data['article_id'])) {
            $article = Article_Model::find_by_id($this->data['article_id']);
            $article->delete();
        }
        redirect_to('/admin/articles');
        
    }
    
    protected function content_view() {
        
    }
    
}
?>