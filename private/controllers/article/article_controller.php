<?php
class Article_Controller extends Static_Main_Controller {
    
    protected $category;
    protected $article;
    protected $comments;
    protected $user;
    protected $new_comment_image;
    
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
        
        
        if(isset($_POST['new_comment'])){
            
            $comment = new Comment_Model;
            $comment->set_article_id($this->article->get_id());
            $comment->set_user_name($_POST['user_name']);
            $comment->set_user_email($_POST['user_email']);
            $comment->set_user_webiste($_POST['user_website']);
            $comment->set_user_comment($_POST['user_comment']);
            $comment->set_entry_datetime(time());

            $comment->set_image($_POST['image']);
            $comment->save();
            
            redirect_to($this->article->get_permalink());
            
            
        }
        
        if(isset($_POST['image_upload_submit'])){
            
            $image = $_FILES['imageupload']['name'];
            
            if($image){
                
                $filename = stripslashes($_FILES['imageupload']['name']);
                $extension = getExtension($filename);
                $extension = strtolower($extension);
                
                 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
                    
                    echo "INVALID EXTENSION";
                    
                 } else {
                    
                    $size=filesize($_FILES['imageupload']['tmp_name']);
                    
                    if ($size > MAX_SIZE*1024)
                    {
                        echo '<h1>You have exceeded the size limit!</h1>';
                        $errors=1;
                    }
                    
                    $image_name=time().'.'.$extension;
                    //$newname="/images/uploads/comments/".$image_name;
                    
                    $newname = IMAGE_UPLOAD_ROOT . 'comments' . DS . $image_name;
                    
                    $copied = move_uploaded_file($_FILES['imageupload']['tmp_name'], $newname);
                    
                    if (!$copied) 
                    {
                        echo '<h1>Copy unsuccessfull!</h1>';
                        $errors=1;
                    } 
                    
                    $this->new_comment_image = $image_name;
                    $this->content_view->new_comment_image = $this->new_comment_image;

                 }
                
            }
            
            
        }
        
        
        $this->content_view->category = $this->category;
        $this->content_view->article = $this->article;
        $this->content_view->user = $this->user;

        $this->comments = Comment_Model::find_all_by_attributes(array("article_id" => $this->article->get_id()));
        $this->content_view->comments = $this->comments;
        
        if($this->article->get_category_id() == STATIC_CATEGORY_ID){
            $this->content_view->show_comments = false;
            $this->content_view->show_date = false;
        } else {
            $this->content_view->show_comments = true;
            $this->content_view->show_date = true;
        }
        
        
  
    }
    
    protected function content_view() {
        
        
        return $this->content_view->capture('article_view.php');
    }
    
   
}
?>