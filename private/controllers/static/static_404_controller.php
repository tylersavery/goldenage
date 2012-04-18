<?php
class Static_404_Controller extends Core_Controller {
    
    protected $content_view;
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title = '404 Error';
        $this->view_config['template_path'] = VIEW_ROOT;
        $this->content_view = new Savant3($this->view_config);
    }
    
    public function render_view() {
        return $this->content_view->capture('http404_view.php');
    }
    
}
?>