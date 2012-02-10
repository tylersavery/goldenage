<?php
class Article_Controller extends Static_Main_Controller {
    
    protected $category;
    protected $article;
    protected $user;
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $this->css[] = CSS_ROOT . 'article.css';
        
        $this->article = Article_Model::find_by_slug($data['article_slug']);
        
        if (!$this->article) { redirect_to('/404'); }
        
        $this->meta[] = 'property="og:title" content="' . $this->article->get_title() . '"';
        $this->meta[] = 'property="og:description" content="' . $this->article->get_subtitle() . '"';
        $this->meta[] = 'property="og:type" content="blog"';
        //$this->meta[] = 'property="og:image" content="' . $this->article->get_image('thumbnail') . '"';
        $this->meta[] = 'property="fb:app_id" content="'.FB_APP_ID.'"';
        
        $this->category = $this->article->get_category();
        $this->user = $this->article->get_user();
        
        $this->content_view->category = $this->category;
        $this->content_view->article = $this->article;
        $this->content_view->user = $this->user;
        
  
    }
    
    protected function content_view() {
        
        
        return $this->content_view->capture('article_view.php');
    }
    
   
}
?>