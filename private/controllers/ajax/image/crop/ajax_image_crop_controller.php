<?php
class Ajax_Image_Crop_Controller extends Ajax_Image_Controller {
    
	protected $error;
	protected $original_image;
	protected $cropped_image;
	protected $crop_x;
	protected $crop_y;
	protected $crop_w;
	protected $crop_h;
	protected $crop_img_w;
	protected $crop_img_h;
	protected $file_img_w;
	protected $file_img_h;
	protected $file_type;
	protected $image_hash;
	protected $target_width;
	protected $target_sufix;
	protected $image_crop_id;
	protected $image_id;
	protected $object_status;
	
    function __construct($uri, $data) {
        parent::__construct($uri, $data);

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['crop_x']) && isset($_POST['crop_y']) && isset($_POST['crop_w']) && isset($_POST['crop_h']) && isset($_POST['crop_img_w']) && isset($_POST['crop_img_h']) && isset($_POST['file_img_w']) && isset($_POST['file_img_h']) && isset($_POST['file_type']) && isset($_POST['crop_image_hash']) && isset($_POST['image_crop_id']) && isset($_POST['object_status'])) {
			$this->crop_x = $_POST['crop_x'];
			$this->crop_y = $_POST['crop_y'];
			$this->crop_w = $_POST['crop_w'];
			$this->crop_h = $_POST['crop_h'];
			$this->crop_img_w = $_POST['crop_img_w'];
			$this->crop_img_h = $_POST['crop_img_h'];
			$this->file_img_w = $_POST['file_img_w'];
			$this->file_img_h = $_POST['file_img_h'];
			$this->file_type = $_POST['file_type'];
			$this->image_hash = $_POST['crop_image_hash'];
			$this->file_suffix = $_POST['file_suffix'];
			$this->target_width = $_POST['target_width'];
			$this->image_crop_id = $_POST['image_crop_id'];
			$this->object_status = $_POST['object_status'];
			$this->error = false;
			
			if (empty($this->file_suffix)) {
				$this->file_suffix = 'crop';	
			}
			
			$image_file = IMAGE_UPLOAD_ROOT.$this->image_hash.'_original.'.$this->file_type;
			$newfilename = $this->image_hash.'_'.$this->file_suffix.'.'.$this->file_type;
			$crop_image_file = IMAGE_UPLOAD_ROOT.$newfilename;
			
			$ratio = 1;
			if (($this->file_img_w != $this->crop_img_w) || ($this->file_img_h != $this->crop_img_h)) {
				$ratio = ($this->file_img_w / $this->crop_img_w); // assuming the crop preview was smaller than the original
			}
			
			$target_x = round($this->crop_x * $ratio);
			$target_y = round($this->crop_y * $ratio);
			$source_w = round($this->crop_w * $ratio);
			$source_h = round($this->crop_h * $ratio);
			if ($this->target_width != 0) {
				$target_w = round($this->target_width);
				$target_h = round($this->target_width * ($source_h / $source_w));
			} else {
				$target_w = $source_w;
				$target_h = $source_h;
			}	
			$crop_image = imagecreatetruecolor($target_w,$target_h);		
			
			switch($this->file_type){
				case "gif":
					$image = @imagecreatefromgif($image_file);
					break;
				case "jpg":
					$image = @imagecreatefromjpeg($image_file);
					break;
				case "jpeg":
					$image = @imagecreatefromjpeg($image_file);
					break;
				case "png":
					$image = @imagecreatefrompng($image_file);
					break;
				default;
					$this->error = true;
			}
			
			if (!imagecopyresampled($crop_image,$image,0,0,$target_x,$target_y,$target_w,$target_h,$source_w,$source_h)) {
				$this->error = true;
			}
			
			switch($this->file_type){
				case "gif":
					if(!@imagegif($crop_image, $crop_image_file)){
						$this->error = true;
					}
					break;
				case "jpg":
					if(!@imagejpeg($crop_image, $crop_image_file, 100)){
						$this->error = true;
					}
					break;
				case "jpeg":
					if(!@imagejpeg($crop_image, $crop_image_file, 100)){
						$this->error = true;
					}
					break;
				case "png":
					if(!@imagepng($crop_image, $crop_image_file, 0)){
						$this->error = true;
					}
					break;
				default;
					$this->error = true;
			}
		} else {
			$this->error = true;
		}
		
		if (!$this->error) {
			$image_model = Image_Model::find_by_attributes(array('file_name'=>$newfilename));
			if (!($image_model)) { $image_model = new Image_Model; }
			$image_model->set_image_crop_id($this->image_crop_id);
			$image_model->set_image_hash($this->image_hash);
			$image_model->set_file_name($newfilename);
			$image_model->set_file_type($this->file_type);
			$image_model->set_file_size(filesize($crop_image_file));
			$image_model->set_file_w($target_w);
			$image_model->set_file_h($target_h);
			$image_model->set_crop_x1($target_x);
			$image_model->set_crop_y1($target_y);
			$image_model->set_crop_x2($source_w + $target_x);
			$image_model->set_crop_y2($source_h + $target_y);
			$image_model->set_status($this->object_status);
			$image_model->save();
			$this->image_id = $image_model->get_id();
		}

	}
    
    protected function content_view() {		
		if (!$this->error) { return json_encode(array('image_id'=>$this->image_id)); }
		return 'error';
    }
  
}  
?>