<?php
class Archive_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $articles = Article_Model::find_home_articles();
        
        $this->content_view->articles = $articles;
        
    }
    
    protected function content_view() {
        
        return $this->content_view->capture('archive_view.php');
        
    }
    
}
    