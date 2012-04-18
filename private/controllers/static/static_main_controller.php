<?php
class Static_Main_Controller extends Static_Base_Controller {
      
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
		$this->js_head[] = '/js/libraries/anythingslider.js';
        $this->css[] = '/css/anythingslider.css';
        $this->css[] = CSS_ROOT . 'main.css';
        $this->js_head[] = JS_ROOT . 'main.js';
        
	}
    
    protected function content_view() {
        return $this->content_view->capture('main_view.php');
    }
	
	   
    protected function header_view() {
        return $this->header_view->capture('main_header_view.php');
    }
    
    protected function footer_view() {
        return $this->footer_view->capture('main_footer_view.php');
    }
    
}
?>