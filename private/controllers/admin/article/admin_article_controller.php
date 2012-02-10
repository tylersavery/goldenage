<?php
class Admin_Article_Controller extends Admin_Controller {
    
    protected $limit;
    protected $offset;
    protected $page;
    protected $page_count;
    protected $total_records;
    protected $order_by;
    protected $order_direction;
    protected $search_query;
    protected $articles;
    
    function __construct($uri, $data) {
        
        parent::__construct($uri, $data);
        $this->title .= ' | Users';
        $this->js_head[] = JS_ROOT.'ajax/ajax_post_article.js';
        $this->js_head[] = JS_ROOT.'libraries/jquery.timepicker.min.js';    
        $this->header_view->active_link = 'articles';
         
        if(isset($_GET['success'])){
            
            switch($_GET['success']){
                case 'facebook':
                    $this->message['type'] = 'success';
                    $this->message['value'] = 'Facebook published successfully.';
                break;
                case 'twitter':
                    $this->message['type'] = 'success';
                    $this->message['value'] = 'Twitter published successfully.';
                break;
            }
            
        }
    }
    
    protected function content_view() {
        
        $this->limit = 10;
        $this->offset = 1;
        $this->page = 1;
        $this->order_by = "id";
        $this->order_direction = "DESC";
        
        if (isset($_GET['limit'])){ $this->limit = $_GET['limit']; }
        if (isset($_GET['page'])){ $this->page = $_GET['page']; }
        if (isset($_GET['order'])) { $this->order_by = $_GET['order']; }
        if (isset($_GET['direction'])) { $this->order_direction = $_GET['direction']; }
        if (isset($_GET['q'])) { $this->search_query = $_GET['q']; }
       
        $this->set_pagination_properties();
        $this->articles = $this->get_articles();
        $this->content_view->articles = $this->articles;
        $this->content_view->pagination_markup = $this->get_pagination_markup();
        $this->content_view->search_query = $this->search_query;
        $this->content_view->categories = Category_Model::find_all();
        $this->content_view->users = User_Model::find_all();
       
        
        return $this->content_view->capture('admin_articles_view.php');        
    }
    
    protected function get_articles() {
        
        //check for search
        if(isset($this->search_query)){
            $sql = "SELECT * FROM articles WHERE title LIKE '%" . $this->search_query . "%' ";
        } else {
            $sql = "SELECT * FROM articles WHERE 1 = 1 ";
        }
        
         if(isset($this->search_query)){
            $count_sql = "SELECT COUNT(*) FROM articles WHERE title LIKE '%" . $this->search_query . "%' ";
        } else {
            $count_sql = "SELECT COUNT(*) FROM articles WHERE 1 = 1 ";
        }
        
        //check for filters
        if (isset($_GET['user_id'])) { $count_sql .= " AND user_id = " . $_GET['user_id']; }
        if (isset($_GET['author_id'])) { $count_sql .= " AND author_id = " . $_GET['author_id']; }
        if (isset($_GET['category_id'])) { $count_sql .= " AND category_id = " . $_GET['category_id']; }

        
        global $database;
        $count_query = $database->query($count_sql);
        $count = $database->fetch_array($count_query);
        $this->total_records = $count[0];
        
        $sql .= " ORDER BY ". $this->order_by . " " . $this->order_direction ." LIMIT " . $this->limit . " OFFSET " . $this->offset;        
        $articles = Article_Model::find_by_sql($sql);
        
        return $articles;
        
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
        if (isset($_GET['user_id'])) { $url_scheme .= '&user_id=' . $_GET['user_id']; }
        if (isset($_GET['category_id'])) { $url_scheme .= '&category_id=' . $_GET['category_id']; }

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