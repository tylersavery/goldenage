<?php

class Publish_Twitter_Article_Controller extends Publish_Twitter_Controller{
    
    protected $t;
    protected $article;
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
    
        $article_id = $data['article_id'];
        $this->article = Article_Model::find_by_id($article_id);

        $twitter = new TwitterOAuth(OAUTH_KEY, OAUTH_SECRET, OAUTH_TOKEN, OAUTH_TOKEN_SECRET);
        
        $status = $this->article->get_twitter_message() . ' - ' . $this->article->get_bitly();
        //other perameters, add to array if neccissary
        $inReplyStatusId = null;
        $lat = null;
        $lng = null;
        $place_id = null;
        
        
        
        $result = $twitter->post('statuses/update', array('status' => $status, 'wrap_links' => false));
        
        $twitter_id = $result->id_str;
        
        $this->article->set_twitter_id($twitter_id);
        $this->article->save();
      
        redirect_to('/admin/articles?success=twitter');
    }
    
    function content_view(){
        
        
        
        /*
        
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
        
        */
        
        
    }
    
    
    
    
}