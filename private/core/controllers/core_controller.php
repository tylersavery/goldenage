<?php
class Core_Controller {
    
    protected $uri;
    protected $title;
    protected $meta;
    protected $css;
    protected $js_head;
    protected $js_foot;
    protected $view_config;
    protected $view;
    protected $errors;
    protected $notices;
    protected $message;
    
    function __construct($uri, $data) {
        $this->uri = $uri;
        $this->data = $data;
        $this->css = array();
        $this->head_js = array();
        $this->foot_js = array();
        $this->view = '';
        $this->message = array();
    }
    
    public function render_view() {
        return $this->view;
    }
    
}
?>