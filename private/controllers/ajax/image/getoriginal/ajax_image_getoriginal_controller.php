<?php
class Ajax_Image_Getoriginal_Controller extends Ajax_Image_Controller {
    
	protected $image_hash;
	protected $image_crop_id;
	protected $error;
	protected $html;
	
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image_hash']) && isset($_POST['image_crop_id'])) {
			$this->image_hash = $_POST['image_hash'];
			$this->image_crop_id = $_POST['image_crop_id'];
			$this->html = '';
			$image = Image_Model::find_by_attributes(array('image_hash'=>$this->image_hash,'image_crop_id'=>$this->image_crop_id));
			if ($image) {
				$this->html .= '<img id="uploaded_image" image_id="'.$image->get_id().'" file_width="'.$image->get_file_w().'" file_type="'.$image->get_file_type().'" image_hash="'.$image->get_image_hash().'" file_height="'.$image->get_file_h().'" recrop="true" src="'.IMAGE_ROOT.'uploads/'.$image->get_file_name().'" alt="'.$image->get_image_hash().'" />';
				$this->error = false;
				return;
			} else {
				$this->error = true;
			}
		}
		$this->error = true;
    }	
	
    protected function content_view() {
        if (!$this->error) { return json_encode(array('html'=>$this->html)); }
		return 'error';
    }
   
}
?>