<?php
class Admin_User_Controller extends Admin_Controller {
    
    protected $limit;
    protected $offset;
    protected $page;
    protected $page_count;
    protected $total_records;
    protected $order_by;
    protected $order_direction;
    protected $search_query;
    protected $users;
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        $this->title .= ' | Users';
        $this->js_head[] = '/js/ajax/ajax_post_user.js';
        $this->js_head[] = '/js/admin/admin_user_delete.js';
        
        $this->view_config['template_path'] = VIEW_ROOT;
        $this->modal_delete_user_view = new Savant3($this->view_config); 
        
        $this->header_view->active_link = 'users';
    }
    
    public function render_view() {
        $this->view .= $this->head_view();
        $this->view .= $this->header_view();
        $this->view .= $this->content_view();
        $this->view .= $this->footer_view();
        $this->view .= $this->foot_view();
        return $this->view;
    }
    
    protected function content_view() {
        
        $this->limit = 10;
        $this->offset = 1;
        $this->page = 1;
        $this->order_by = "id";
        $this->order_direction = "ASC";        
        
        if (isset($_GET['limit'])){ $this->limit = $_GET['limit']; }
        if (isset($_GET['page'])){ $this->page = $_GET['page']; }
        if (isset($_GET['order'])) { $this->order_by = $_GET['order']; }
        if (isset($_GET['direction'])) { $this->order_direction = $_GET['direction']; }
        if (isset($_GET['q'])) { $this->search_query = $_GET['q']; }        
        
        $this->set_pagination_properties();        
        $this->users = $this->get_users();
        $this->content_view->users = $this->users;
        $this->content_view->pagination_markup = $this->get_pagination_markup();
        $this->content_view->search_query = $this->search_query;
        return $this->content_view->capture('admin_users_view.php');
    }
    
    protected function modal_delete_user_view() {
        return $this->modal_delete_user_view->capture('admin_delete_user_modal_view.php');
    }
    
    protected function get_users() {
        
        //check for search
        if(isset($this->search_query)){
            $sql = "SELECT * FROM users WHERE first_name LIKE '%" . $this->search_query . "%' OR last_name LIKE '%" . $this->search_query . "%' OR email LIKE '%" . $this->search_query . "%'";
        } else {
            $sql = "SELECT * FROM users WHERE 1 = 1";
        }
        
         if(isset($this->search_query)){
            $count_sql = "SELECT COUNT(*) FROM users WHERE first_name LIKE '%" . $this->search_query . "%' OR last_name LIKE '%" . $this->search_query . "%' OR email LIKE '%" . $this->search_query . "%'";
        } else {
            $count_sql = "SELECT COUNT(*) FROM users WHERE 1 = 1 ";
        }
        
        global $database;
        $count_query = $database->query($count_sql);
        $count = $database->fetch_array($count_query);
        $this->total_records = $count[0];
        
        $sql .= " ORDER BY ". $this->order_by . " " . $this->order_direction ." LIMIT " . $this->limit . " OFFSET " . $this->offset;        
        $users = User_Model::find_by_sql($sql);
        return $users;
        
    }
    
    protected function set_pagination_properties(){
        $this->offset = $this->limit * $this->page - $this->limit;
        $this->page_count = ceil($this->total_records / $this->limit);
    }
    
    protected function get_pagination_markup() {
        
        $a = array();   
        $url_scheme = '?page=%page%';
        
        if (isset($_GET['order'])) { $url_scheme .= '&order=' . $this->order_by; }
        if (isset($_GET['direction'])) { $url_scheme .= '&direction=' . $this->order_direction; }
        if (isset($_GET['q'])) { $url_scheme .= '&q=' . $this->search_query; }
        if (isset($_GET['status'])) { $url_scheme .= '&status=' . $_GET['status']; }

        $paging = new Pagination();
        $paging->set('urlscheme', $url_scheme);
        $paging->set('perpage',$this->limit);
        $paging->set('page',max(1,intval($this->page)));
        $paging->set('total',$this->total_records);
        $paging->set('nexttext','Next');
        $paging->set('prevtext','Previous');
        $paging->set('focusedclass','active');
        $paging->set('delimiter','');
        $paging->set('numlinks',12);
        $paging->generateOutput();

        return $paging->output;
        
    }
    
}
?>