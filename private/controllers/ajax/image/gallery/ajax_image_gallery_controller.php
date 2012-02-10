<?php
class Ajax_Image_Gallery_Controller extends Ajax_Image_Controller {
    
	protected $offset;
	protected $limit;
	protected $selection_made;
	protected $html;
	protected $error;
	protected $count;
	protected $more;
	protected $total_results;
	
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['offset']) && isset($_POST['limit']) && isset($_POST['selection_made'])) {
			$this->offset = $_POST['offset'];
			$this->limit = $_POST['limit'];
			$this->selection_made = $_POST['selection_made'];
			$this->more = true;
			$this->html = '';
			$sql = "SELECT * FROM images WHERE status = 'a' AND image_crop_id = 3 ORDER BY time_update DESC LIMIT ".$this->limit." OFFSET ".$this->offset; // all active thumbnails
			$images = Image_Model::find_by_sql($sql);
			$this->count = sizeof($images);
			$sql = "SELECT COUNT(*) FROM images WHERE status = 'a' AND image_crop_id = 3";
			$this->total_results = Image_Model::count_all_by_sql($sql);
			if ($this->count == 0 || ($this->count + $this->offset) >= $this->total_results) {
				$this->more = false;
			}
			foreach ($images as $image) {
				if ($this->selection_made == 'true') {
					$this->html .= "<div class='image_container not_selected' image_hash='".$image->get_image_hash()."'>\n";
				} else {
					$this->html .= "<div class='image_container' image_hash='".$image->get_image_hash()."'>\n";	
				}
				$this->html .= "\t<span class='image_action_bg'></span><span class='image_action crop_action'><p>Crop</p></span><span class='image_action delete_action'><p>Delete</p></span>\n";
				$this->html .= "\t<img src='".IMAGE_ROOT.'uploads/'.$image->get_file_name()."?".time()."' />\n";
				$this->html .= "</div>\n";
			}
			$this->error = false;
		} else {
			$this->error = true;
		}
    }	
	
    protected function content_view() {
        if (!$this->error) { return json_encode(array('more'=>$this->more,'html'=>$this->html)); }
		return 'error';
    }
   
}
?>