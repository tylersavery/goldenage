<?php
class Blur_Controller extends Core_Controller {
    

    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $image_p = PUBLIC_ROOT . $uri[1] . '/' . $uri[2] . '/' . $data['filename'];
        //echo $image_p;

        $attr = getimagesize($image_p);
		$mime = $attr['mime'];
        header('Content-Type: ' . $mime);
        
        switch($mime){
            case 'image/jpeg':
            case 'image/jpg':    
                $image = imagecreatefromjpeg($image_p);
            break;
            case 'image/png':
                $image = imagecreatefrompng($image_p);
            break;
            case 'image/gif':
                $image = imagecreatefromgif($image_p);
            break;
        }
        /*
		imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        imagefilter($image, IMG_FILTER_GAUSSIAN_BLUR);
        */
        
        imagefilter($image, IMG_FILTER_PIXELATE, 32, false);
        
        
        switch($mime){
            case 'image/jpeg':
            case 'image/jpg':
                imagejpeg($image);
            break;
            case 'image/png':
                imagepng($image);
            break;
            case 'image/gif':
                imagegif($image);
            break;
        }
        
        
        
    }
    
}