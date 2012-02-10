<?php
class Image_Model extends Core_Image_Model {

	function __construct() {
		parent::__construct();
	}

	public function create(){
		$this->set_time_create(time());
		$this->set_time_update(time());
		parent::create();
	}
	
	public function update(){
		$this->set_time_update(time());
		parent::update();
	}
    
    public static function get_image_by_hash($type = 'main', $image_hash) {
		$name = $image_hash . '_' . $type;
		$file = IMAGE_UPLOAD_ROOT . $name;
		
		$image = IMAGE_ROOT . 'uploads/' . $image_hash . '_' . $type;
		
		if (is_file(IMAGE_UPLOAD_ROOT . $name.'.jpg')) {
			return $image.'.jpg';
		} else if (is_file(IMAGE_UPLOAD_ROOT . $name.'.png')) {
			return $image.'.png';
		} else if (is_file(IMAGE_UPLOAD_ROOT . $name.'.gif')) {
			return $image.'.gif';
		}
		
		return false;
	}
    
}
?>