<?php
class Home_Controller extends Static_Main_Controller {
    
    protected $article;
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $this->css[] = CSS_ROOT . 'home.css';
        $this->articles = Article_Model::find_all_articles();
        
        $this->content_view->articles = $this->articles;
    }
    
    protected function content_view() {
        return $this->content_view->capture('home_view.php');
    }
    
   
}
?>