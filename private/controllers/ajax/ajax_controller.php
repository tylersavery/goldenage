<?php
class Ajax_Controller extends Core_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->view_config['template_path'] = VIEW_ROOT;
        $this->content_view = new Savant3($this->view_config);
    }
    
    public function render_view() {
        $this->view .= $this->content_view();
        return $this->view;
    }
    
    protected function content_view() {
        return;
    }
    
}
?>