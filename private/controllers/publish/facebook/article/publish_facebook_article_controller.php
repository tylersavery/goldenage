<?php

class Publish_Facebook_Article_Controller extends Publish_Facebook_Controller{
    
    protected $fb_user;
    protected $article;
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
    
        $article_id = $data['article_id'];
        $this->article = Article_Model::find_by_id($article_id);

        $this->fb_user = $this->facebook->getUser();
        
    }
    
    function content_view(){
        
        if(!$this->fb_user){
            $this->content_view->login_url = $this->facebook->getLoginUrl() . '&scope=publish_stream,offline_access';
            return $this->content_view->capture('facebook_login_view.php');
        }
        
        if($this->article->get_category()){
            $message = 'New article posted in '. $this->article->get_category()->get_title();
        } else {
            $message = $this->article->get_title();
        }
        
        $name = $this->article->get_title();
        $subtitle = $this->article->get_subtitle();
        $description = $this->article->get_excerpt();
        $link = $this->article->get_permalink(true);
        
         $attachment = array(
            'message' => $message,
            'name' => $name,
            'caption' => $subtitle,
            'link' => $link,
            'description' => $description,
            'picture' => 'http://www.lalibre.be/img/logoLaLibre.gif',
            'actions' => array(
                            array(
                                 'name' => 'Read More',
                                 'link' => $link)
                             )
        );
        
        $result = $this->facebook->api('/me/feed/', 'post', $attachment);
        
        
        
        
        if($result){
            $this->article->set_facebook_id($result['id']);
            $this->article->save();
            
            redirect_to('/admin/articles?success=facebook');
        } else {
            redirect_to('/admin/articles?failure=facebook');
        }
        
        
        
        
    }
    
    
    
    
}