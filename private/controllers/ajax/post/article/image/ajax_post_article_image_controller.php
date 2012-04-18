<?php
class Ajax_Post_Article_Image_Controller extends Ajax_Post_Controller {
    
    private $article_id;
	private $image_hash;
    private $action;
	private $error;
	private $sql;
	
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->action = 'nothing';
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['article_id']) && isset($_POST['image_hash'])) {
            $this->article_id = $_POST['article_id'];
            $this->image_hash = $_POST['image_hash'];
            global $database;
			
			$sql = "INSERT INTO article_image_hashes (article_id, image_hash) VALUES (". $this->article_id .", '".$this->image_hash."')";
			
            $sql2 =  "INSERT INTO article_image_hashes (article_id, image_hash) SELECT ".$this->article_id.",'".$this->image_hash."' ".
                    "FROM article_image_hashes WHERE NOT EXISTS ".
                    "(SELECT * FROM article_image_hashes WHERE article_id = ".$this->article_id." AND image_hash = '".$this->image_hash."') LIMIT 1";
			$this->sql = $sql;
			$result = $database->query($sql);
            $affected_rows = $database->affected_rows($result);
            if ($affected_rows > 0) {
                $this->action = 'added';
            } else {
                $this->action = 'exists';
            }
            $this->error = false;
        } else {
            $this->error = true;
        }
	}
    
    protected function content_view() {
		if (!$this->error) { return json_encode(array('article_id'=>$this->article_id,'image_hash'=>$this->image_hash,'action'=>$this->action)); }
		return 'error';
    }
   
}
?>