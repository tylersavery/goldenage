<?php
class Static_Base_Controller extends Core_Controller {
    
    protected $head_view;
    protected $content_view;
    protected $foot_view;
    protected $view_config;
    protected $base_view_config;
	protected $facebook;
	protected $twitter;
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        $this->title = 'Golden Age';
        
        $this->css[] = CSS_ROOT.'reset.css';        
        
        $this->meta[] = 'content="text/html; charset=utf-8" http-equiv="Content-Type"';    
        
        $this->js_head[] = JS_ROOT.'libraries/jquery.min.js';
        $this->js_head[] = JS_ROOT.'functions.js';
        
        $this->view_config['template_path'] = VIEW_ROOT;
        $this->head_view = new Savant3($this->view_config);
        $this->foot_view = new Savant3($this->view_config);
        $this->content_view = new Savant3($this->view_config);
        $this->header_view = new Savant3($this->view_config);
        $this->footer_view = new Savant3($this->view_config);
		
		
		
    }
    
    public function render_view() {
        
		$this->view .= $this->head_view();
        $this->view .= $this->header_view();
        $this->view .= $this->content_view();
        $this->view .= $this->footer_view();
        $this->view .= $this->foot_view();
		
        return $this->view;
    }
    
    protected function head_view() {
        $this->head_view->title = $this->title;
        $this->head_view->meta = $this->meta;
        $this->head_view->css = $this->css;
        $this->head_view->js = $this->js_head;
        return $this->head_view->capture('head_view.php');
    }
    
    protected function foot_view() {
        $this->foot_view->js = $this->js_foot;
        return $this->foot_view->capture('foot_view.php');
    }
    
    protected function content_view() {
        return;
    }
    
    protected function header_view() {
        return;
    }
    
    protected function footer_view() {
		return;
	
    }
    
}
?>