<?php
class Ajax_Image_Status_Controller extends Ajax_Image_Controller {
    
	private $image_hash;
	private $thumbnail;
	private $status;
	private $error;
	
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image_hash']) && isset($_POST['status'])) {
			$this->image_hash = $_POST['image_hash'];
			$this->status = $_POST['status'];
			$image_models = Image_Model::find_all_by_attributes(array('image_hash'=>$this->image_hash));
			foreach ($image_models as $image_model) {
				if ($image_model) {
					$image_model->set_status($this->status);
					$image_model->save();
					if ($image_model->get_image_crop_id() == 3) { $this->thumbnail = $image_model; }
				} else {
					$this->error = true;
				}
			}
		} else {
			$this->error = true;
		}
	
	}
    
    protected function content_view() {
		if (!$this->error) { return '{"thumbnail":"'.IMAGE_ROOT.'uploads/'.$this->thumbnail->get_file_name().'"}'; }
		return 'error';
    }
   
}
?>