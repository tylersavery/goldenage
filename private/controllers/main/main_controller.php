<?php
class Main_Controller extends Static_Main_Controller {
    
    protected $article;
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);

        $this->articles = Article_Model::find_home_articles();
        
        $this->content_view->articles = $this->articles;
    }
    
    
    protected function content_view() {
        return $this->content_view->capture('main_view.php');
    }
    
   
}
?>