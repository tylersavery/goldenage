<?php
class Ajax_Image_Cropcoords_Controller extends Ajax_Image_Controller {
    
	protected $image_hash;
	protected $image_crop_id;
	protected $crop_width;
	protected $x1;
	protected $y1;
	protected $x2;
	protected $y2;
	protected $error;
	protected $file_w;
	protected $ratio;
	
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image_hash']) && isset($_POST['image_crop_id']) && isset($_POST['crop_width'])) {
			$this->image_hash = $_POST['image_hash'];
			$this->image_crop_id = $_POST['image_crop_id'];
			$this->crop_width = $_POST['crop_width'];
			$image = Image_Model::find_by_attributes(array('image_hash'=>$this->image_hash,'image_crop_id'=>$this->image_crop_id));
			$original_image = Image_Model::find_by_attributes(array('image_hash'=>$this->image_hash,'image_crop_id'=>1));
			if ($image) {
				$ratio = 1;
				if ($original_image->get_file_w() > $this->crop_width) {
					$ratio = $this->crop_width / $original_image->get_file_w();
				}
				$this->ratio = $ratio;
				$this->file_w = $original_image->get_file_w();
				$this->x1 = round($image->get_crop_x1() * $ratio);
				$this->y1 = round($image->get_crop_y1() * $ratio);
				$this->x2 = round($image->get_crop_x2() * $ratio);
				$this->y2 = round($image->get_crop_y2() * $ratio);
				$this->error = false;
				return;
			} else {
				$this->error = true;
			}
		}
		$this->error = true;
    }	
	
    protected function content_view() {
        if (!$this->error) { return json_encode(array('crop_width'=>$this->crop_width,'file_w'=>$this->file_w,'ratio'=>$this->ratio,'x1'=>$this->x1,'y1'=>$this->y1,'x2'=>$this->x2,'y2'=>$this->y2)); }
		return 'error';
    }
   
}
?>