<?php
class Admin_Controller extends Static_Base_Controller {
    
    protected $user;
    protected $image_upload;
    
    function __construct($uri, $data) {
        $this->check_login_session();
        parent::__construct($uri, $data);
        
        $this->title .= ' | Admin';        
        
        //$this->js_head[] = JS_ROOT.'admin/table_sort.js';
        //$this->js_head[] = JS_ROOT.'admin/table_search.js';
        $this->js_head[] = JS_ROOT.'admin/url_parser.js';
        $this->js_head[] = JS_ROOT.'admin/bootstrap_modal.js';
        $this->js_head[] = JS_ROOT.'admin/bootstrap_dropdown.js';
        $this->js_head[] = JS_ROOT.'admin/bootstrap_buttons.js';
        $this->js_head[] = JS_ROOT.'admin/jquery.ui.core.js';
        $this->js_head[] = JS_ROOT.'admin/jquery.ui.widget.js';
        $this->js_head[] = JS_ROOT.'admin/jquery.ui.datepicker.js';
        $this->js_head[] = JS_ROOT.'admin/tinymce/tinymce.js';
        $this->js_head[] = JS_ROOT.'admin/tinymce/config.js';
        $this->js_head[] = JS_ROOT.'admin/admin_image_manage.js';
        $this->js_head[] = JS_ROOT.'libraries/jcrop.js';
        $this->js_head[] = JS_ROOT.'admin/admin.js';
        
        $this->css[] = CSS_ROOT.'bootstrap.min.css';
        $this->css[] = CSS_ROOT.'smoothness/jquery-ui-theme.css';
        $this->css[] = CSS_ROOT.'jcrop.css';
        $this->css[] = CSS_ROOT.'admin.css';
        
        $this->image_upload['ajax_url'] = '/ajax/image/upload';
        $this->image_upload['maxSize'] = 10485760; // in bytes, this limit 10MB
        $this->image_upload['maxW'] = 6000;
        $this->image_upload['maxH'] = 4000;
        $this->image_upload['fullPath'] = get_full_url().'/images/uploads/';
        $this->image_upload['relPath'] = 'images/uploads/';
        $this->image_upload['colorR'] = 255;
        $this->image_upload['colorG'] = 255;
        $this->image_upload['colorB'] = 255;
        
        $this->image_manage_view = new Savant3($this->view_config);
        $this->image_manage_view->image_upload = $this->image_upload;   
        $this->image_manage_view->imagecrops = Imagecrop_Model::find_all();
        $this->image_manage_view->image_upload = $this->image_upload; 
        
        global $session;
        if (get_called_class() != 'Admin_Login_Controller' && $session->get_id()) {
            $this->user = User_Model::find_by_id($session->get_id());
            $this->check_user_permissions();
        }
        
        
        $this->content_view->user = $this->user;
        
    }
    
    public function render_view() {
        $this->view .= $this->head_view();
        $this->view .= $this->header_view();
        $this->view .= $this->content_view();
        $this->view .= $this->footer_view();
        $this->view .= $this->image_manage_view();
        $this->view .= $this->foot_view();
        return $this->view;
    }
    
    protected function content_view() {
        redirect_to('/admin/articles');
        return $this->content_view->capture('admin_view.php');
    }
    
    protected function image_manage_view() {
        return $this->image_manage_view->capture('admin_manage_images_modal_view.php');
    }
    
    
    protected function validate_login() {
        if (isset($_POST['email']) && isset($_POST['password'])) {
            global $session;
            $user = User_Model::authenticate($_POST['email'], $_POST['password']); 
            if ($user) {
                if ($user->get_type() > 0) { // 0 = default user, anything higher has access to login
                    $session->login($user);
                    redirect_to('/admin');  
                } else {
                    $this->notices[] = 'You do not sufficient permissions.'; 
                }
            } else {
                $this->notices[] = 'Login failed, please try again.';
            }
        }
    }
    
    protected function check_login_session() {
        global $session;
        if (get_called_class() != 'Admin_Login_Controller' && !$session->is_logged_in()) { redirect_to('/admin/login'); }
    }
    
    protected function check_user_permissions() {
        switch($this->user->get_type()) {
            case 0:
                redirect_to('/admin/login/logout');
                break;
            
            case 1:
                if (get_called_class() == 'Admin_User_Controller' || get_called_class() == 'Admin_Category_Controller' || get_called_class() == 'Admin_Subcategory_Controller' || get_called_class() == 'Admin_Dailycable_Controller') {
                    redirect_to('/admin/articles');
                }
                break;
            
            case 5:
                if (get_called_class() == 'Admin_User_Controller' || get_called_class() == 'Admin_Category_Controller' || get_called_class() == 'Admin_Subcategory_Controller' || get_called_class() == 'Admin_Dailycable_Controller') {
                    redirect_to('/admin');
                }
                break;
            
            case 10:
                
                break;
        }
    }
    
    protected function header_view() {
        $this->header_view->message = $this->message;
        $this->header_view->breadcrums = $this->get_breadcrums();
        $this->header_view->user = $this->user;
        return $this->header_view->capture('admin_header_view.php');
    }
    
    protected function footer_view() {
        return $this->footer_view->capture('admin_footer_view.php');
    }
    
    protected function get_breadcrums() {
        $a = array();
        $url = '';
        $size = sizeof($this->uri);
        $i = 0;
        foreach ($this->uri as $item) {
            $i++;
            $url .= '/' . $item;
            if ($i >= $size || $item == 'edit') {
                $a[ucwords($item)] = '';
            } else {
                $a[ucwords($item)] = $url;
            }
        }
        if (sizeof($this->uri) > 1) {
            return $a;
        } else {
            return false;
        }

    }    
      
}
?>