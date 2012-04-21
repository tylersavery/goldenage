<?php
class Ajax_Image_Upload_Controller extends Ajax_Image_Controller {
    
    private $filename;
    private $maxSize;
    private $maxW;
    private $maxH;
    private $fullPath;
    private $relPath;
    private $colorR;
    private $colorG;
    private $colorB;
    private $filesize_image;
    private $imgUploaded;
    private $upload_image;
    private $errorList;
	private $file_type;
	private $file_width;
	private $file_height;
	private $image_id;
	private $image_hash;
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
		
        $this->js_head[] = JS_ROOT.'admin/admin_article.js';
        $this->filename = strip_tags($_REQUEST['filename']);
        $this->maxSize = strip_tags($_REQUEST['maxSize']);
        $this->maxW = strip_tags($_REQUEST['maxW']);
        $this->maxH = strip_tags($_REQUEST['maxH']);
        $this->fullPath = strip_tags($_REQUEST['fullPath']);
        $this->relPath = strip_tags($_REQUEST['relPath']);
        $this->colorR = strip_tags($_REQUEST['colorR']);
        $this->colorG = strip_tags($_REQUEST['colorG']);
        $this->colorB = strip_tags($_REQUEST['colorB']);
        $this->filesize_image = $_FILES[$this->filename]['size'];
		
        if ($this->filesize_image > 0) {
            $this->upload_image = $this->uploadImage($this->filename, $this->maxSize, $this->maxW, $this->maxH, $this->fullPath, $this->relPath, $this->colorR, $this->colorG, $this->colorB);
            if (is_array($this->upload_image)) {
                foreach ($this->upload_image as $key => $value) {
                    if ($value == "-ERROR-") {
                        unset($this->upload_image[$key]);
                    }
                }
                $document = array_values($this->upload_image);
                for ($x=0; $x<sizeof($document); $x++) {
                    $this->errorList[] = $document[$x];
                }
                $this->imgUploaded = false;
            } else {
                $this->imgUploaded = true;
            }
        } else {
            $this->imgUploaded = false;
            $this->errorList[] = "Select a file";
        }     
        
    }
    
    protected function content_view() {
        $result = '';
        if($this->imgUploaded) {
			$result .= '<img id="uploaded_image" image_id="'.$this->image_id.'" file_width="'.$this->file_width.'" file_type="'.$this->file_type.'" image_hash="'.$this->image_hash.'" file_height="'.$this->file_height.'" src="'.$this->upload_image.'" alt="'.$this->upload_image.'" />';      	
		} else {
			$result .= '<div class="alert-message error">';
			$result .= (sizeof($this->errorList) > 1) ? "<strong>Error(s):</strong> ": "<strong>Error:</strong> ";
            foreach ($this->errorList as $key=>$value) {
				$result .= ((sizeof($this->errorList)-1) == $key) ? $value: $value.", ";
            }
			$result .= '</div>';
        }
        return $result;
    }
    
    private function uploadImage($fileName, $maxSize, $maxW, $maxH = null, $fullPath, $relPath, $colorR, $colorG, $colorB){
		$folder = $relPath;
		$maxlimit = $maxSize;
		$allowed_ext = "jpg,jpeg,gif,png";
		$match = "";
		$break_out = false;
		$filesize = $_FILES[$fileName]['size'];
		$errorList = array();
		if($filesize > 0) {
			$filename = strtolower($_FILES[$fileName]['name']);
			$filename = preg_replace('/\s/', '_', $filename);
		   	if($filesize < 1){ 
				$errorList[] = "File size is empty";
			}
			if($filesize > $maxlimit){ 
				$errorList[] = "File size is too big (max ".format_file_size($maxlimit).")";
				$match = "1";
			}
			if(count($errorList)<1){
				$file_ext = preg_split("/\./",$filename);
				$allowed_ext = preg_split("/\,/",$allowed_ext);
				foreach($allowed_ext as $ext){
					if($ext==end($file_ext)){
						$match = "1"; // File is allowed
						$NUM = time();
						$front_name = substr($file_ext[0], 0, 15);
						$this->image_hash = md5($NUM.$front_name);
						$newfilename = $this->image_hash."_original.".end($file_ext);
						$filetype = end($file_ext);
						$this->file_type = $filetype;
						$save = $folder.$newfilename;
						if(!file_exists($save)){
							list($width_orig, $height_orig) = getimagesize($_FILES[$fileName]['tmp_name']);							
							if($maxH == null){
								if($width_orig < $maxW){
									$fwidth = $width_orig;
								}else{
									$fwidth = $maxW;
								}
								$ratio_orig = $width_orig/$height_orig;
								$fheight = $fwidth/$ratio_orig;
								
								$blank_height = $fheight;
								$top_offset = 0;	
							}else{
																
								if($width_orig <= $maxW && $height_orig <= $maxH){
									$fheight = $height_orig;
									$fwidth = $width_orig;
								}else{
									$errorList[] = "File dimensions are too big (max ".$maxW."x".$maxH." pixels)";
									$break_out = true;
									if($width_orig > $maxW){
										$ratio = ($width_orig / $maxW);
										$fwidth = $maxW;
										$fheight = ($height_orig / $ratio);
										if($fheight > $maxH){
											$ratio = ($fheight / $maxH);
											$fheight = $maxH;
											$fwidth = ($fwidth / $ratio);
										}
									}
									if($height_orig > $maxH){
										$ratio = ($height_orig / $maxH);
										$fheight = $maxH;
										$fwidth = ($width_orig / $ratio);
										if($fwidth > $maxW){
											$ratio = ($fwidth / $maxW);
											$fwidth = $maxW;
											$fheight = ($fheight / $ratio);
										}
									}
								}
								if($fheight == 0 || $fwidth == 0 || $height_orig == 0 || $width_orig == 0){
									die("FATAL ERROR");
								}
								if($fheight < 45){
									$blank_height = 45;
									$top_offset = round(($blank_height - $fheight)/2);
								}else{
									$blank_height = $fheight;
								}
							}
							if (!$break_out) {
								$this->file_width = $fwidth;
								$this->file_height = $blank_height;
								$image_p = imagecreatetruecolor($fwidth, $blank_height);
								$white = imagecolorallocate($image_p, $colorR, $colorG, $colorB);
								imagefill($image_p, 0, 0, $white);
								switch($filetype){
									case "gif":
										$image = @imagecreatefromgif($_FILES[$fileName]['tmp_name']);
									break;
									case "jpg":
										$image = @imagecreatefromjpeg($_FILES[$fileName]['tmp_name']);
									break;
									case "jpeg":
										$image = @imagecreatefromjpeg($_FILES[$fileName]['tmp_name']);
									break;
									case "png":
										$image = @imagecreatefrompng($_FILES[$fileName]['tmp_name']);
									break;
								}
								@imagecopyresampled($image_p, $image, 0, $top_offset, 0, 0, $fwidth, $fheight, $width_orig, $height_orig);
								switch($filetype){
									case "gif":
										if(!@imagegif($image_p, $save)){
											$errorList[]= "PERMISSION DENIED [GIF]";
										}
									break;
									case "jpg":
										if(!@imagejpeg($image_p, $save, 100)){
											$errorList[]= "PERMISSION DENIED [JPG]";
										}
									break;
									case "jpeg":
										if(!@imagejpeg($image_p, $save, 100)){
											$errorList[]= "PERMISSION DENIED [JPEG]";
										}
									break;
									case "png":
										if(!@imagepng($image_p, $save, 0)){
											$errorList[]= "PERMISSION DENIED [PNG]";
										}
									break;
								}
								@imagedestroy($filename);
							}
						} else {
							$errorList[]= "CANNOT MAKE IMAGE IT ALREADY EXISTS";
						}	
					} else {
						$typeallowed = false;
					}
				}		
			}
		}else{
			$errorList[]= "NO FILE SELECTED";
		}
		if(!$match){
		   	$errorList[]= "File type isn't allowed: $filename";
		}
		if(sizeof($errorList) == 0){
			
			$image_model = new Image_Model;
			$image_model->set_image_crop_id(1); // original
			$image_model->set_image_hash($this->image_hash);
			$image_model->set_file_name($newfilename);
			$image_model->set_file_type($filetype);
			$image_model->set_file_size($filesize);
			$image_model->set_file_w($fwidth);
			$image_model->set_file_h($fheight);
			$image_model->set_crop_x1(0);
			$image_model->set_crop_y1(0);
			$image_model->set_crop_x2(0);
			$image_model->set_crop_y2(0);
			$image_model->set_status('u');
			$image_model->save();
			$this->image_id = $image_model->get_id();
			return $fullPath.$newfilename;
		}else{
			$eMessage = array();
			for ($x=0; $x<sizeof($errorList); $x++){
				$eMessage[] = $errorList[$x];
			}
		   	return $eMessage;
		}
	}
	
	
	/* might not need VVVV */
	
	protected function blur_image($image_p, $save, $quality, $type){
		$attr = getimagesize($image_p);
		
		$image2 = imagecreate($attr[0], $attr[1]);
		imagecopy($image2, $image_p, 0, 0, $attr[0], $attr[1], $attr[0], $attr[1]);
		imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
		imagecopy($image, $image2, 0, 0, $attr[0], $attr[1], $attr[0], $attr[1]);
		
		$s = explode('.', $save);
		
		$save = $s[0] . '_blur' . $s[1];
		
		switch($type){
			case 'jpg':
				imagejpeg($image2, $save, 100);
				break;
		}
	}
   
}
?>