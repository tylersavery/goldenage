<?php
class Ajax_Get_Article_Images_Controller extends Ajax_Get_Controller {
    
    private $article;
    private $image_hashes;
    private $html;
	private $error;
	
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
		if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['article_id'])) {
            $this->article = Article_Model::find_by_id($_GET['article_id']);
            if (!empty($this->article)) {
                $this->image_hashes = $this->article->get_all_image_hashes();
                
                $this->html = "";
				if($this->image_hashes){
					foreach ($this->image_hashes as $key => $image_hash) {
						if ($this->selection_made == 'true') {
							$this->html .= "<div class='image_container not_selected' image_hash='".$image_hash."'>\n";
						} else {
							$this->html .= "<div class='image_container' image_hash='".$image_hash.">\n";	
						}
						$this->html .= "\t<span class='image_action_bg'></span><span class='image_action crop_action'><p>Crop</p></span><span class='image_action remove_action'><p>Remove</p></span>\n";
						$this->html .= "\t<img src='".Image_Model::get_image_by_hash('thumbnail', $image_hash)."?time=".time()."' />\n";
						$this->html .= "</div>\n";
					}
				}
                
                $this->error = false;
            } else {
                $this->error = true;
            }
        } else {
            $this->error = true;
        }
	}
    
    protected function content_view() {
		if (!$this->error) { return json_encode(array('article_id'=>$this->article->get_id(),'image_hashes'=>$this->image_hashes,'html'=>$this->html)); }
		return 'error';
    }
   
}
?>