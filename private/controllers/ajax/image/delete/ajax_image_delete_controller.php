<?php
class Ajax_Image_Delete_Controller extends Ajax_Image_Controller {
    
	protected $image_hash;
	protected $error;
	
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
		$this->error = true;
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image_hash'])) {
			$this->image_hash = $_POST['image_hash'];
			$images = Image_Model::find_all_by_attributes(array('image_hash'=>$this->image_hash));
			$articles = Article_Model::find_all_by_attributes(array('image_hash'=>$this->image_hash));
			foreach ($images as $image) {
				//@chmod(IMAGE_UPLOAD_ROOT.$image->get_file_name(),0777);
				//@unlink(IMAGE_UPLOAD_ROOT.$image->get_file_name());
				$image->delete();
			}
			if (!empty($articles) && sizeof($articles) > 0) {
				foreach ($articles as $article) {
					$article->set_image_hash(null);
					$article->save();
				}
			}
			
			$this->error = false;
		}
    }	
	
    protected function content_view() {
        if (!$this->error) { return json_encode(array('success'=>'true')); }
		return 'error';
    }
   
}
?>