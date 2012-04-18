<?php

class Static_Scaffolding_Controller extends Static_Base_Controller {
    
    private $model_name;
    private $model_extends;
    private $model_attributes;
    private $admin_url;
    private $table_name;
    private $db_fields;
    private $admin_ignored_attributes;
    private $db_engine;
    private $data; 
    
    function __construct($uri, $data) {  
               
        switch($data['model_name']){
            case 'user':
                $this->generate_users();
                break;
            case 'player':
                $this->generate_players();
                break;
            case 'payment':
                $this->generate_payments();
                break;
            case 'event':
                $this->generate_events();
                break;
            case 'event_type':
                $this->generate_event_types();
                break;
            case 'page':
                $this->generate_pages();
                break;
            case 'comment':
                $this->generate_comments();
                break;
            default:
                die("Model " . $data['model_name'] . " not found.");
                break;
        }
        
        $this->data = $data;
        
        
    }
    
    protected function generate_users() {
            
        $this->model_name = 'User';
        $this->model_extends = 'Core';
        $this->admin_url = '/admin/';
        $this->table_name = 'users';
        
        $this->model_attributes = array(
            
            array('id', 'id', 'int'),
            array('username', 'Username', 'varchar'),
            array('email', 'Email', 'varchar'),
            array('password', 'Password', 'varchar'),
            array('first_name', 'First Name', 'varchar'),
            array('last_name', 'Last Name', 'varchar'),
            array('admin', 'Is Admin?', 'bool'),
            array('birthday', 'Birthday', 'varchar'),
            array('address', 'Address', 'varchar'),
            array('city', 'City', 'varchar'),
            array('province', 'Province', 'varchar'),
            array('zip', 'Zip', 'varchar'),
            array('phone_cell', 'Cell Phone', 'varchar'),
            array('phone_work', 'Work Phone', 'varchar'),
            array('phone_home', 'Home Phone', 'varchar'),
            array('position', 'Position', 'varchar'),
            array('email_mother', 'Email (Mother)', 'varchar'),
            array('email_father', 'Email (Father)', 'varchar'),
            array('jersey_size', 'Jersey Size', 'varchar'),
            array('jersey_number', 'Jersey Number', 'varchar'),
            array('current_team', 'Current Team', 'varchar'),
            array('time_create', 'Time Created', 'datetime'),
            array('time_update', 'Time Updated', 'datetime'),
            array('last_login', 'Last Login', 'datetime')

        );
        
        
        $this->db_fields = $this->model_attributes;
        
        $this->admin_ignored_attributes = array();
        
        $this->db_engine = 'innodb';
        
        
    }
    
    protected function generate_players() {
            
        $this->model_name = 'Player';
        $this->model_extends = 'Core';
        $this->admin_url = '/admin/';
        $this->table_name = 'players';
        
        $this->model_attributes = array(
            
            array('id', 'id', 'int'),
            array('user_id', 'User', 'int'),
            array('team', 'Team', 'bool'),
            array('members', 'Members', 'int')

        );
        
        
        $this->db_fields = $this->model_attributes;
        
        $this->admin_ignored_attributes = array();
        
        $this->db_engine = 'innodb';
        
        
    }
    
    protected function generate_comments() {
            
        $this->model_name = 'Comment';
        $this->model_extends = 'Core';
        $this->admin_url = '/admin/';
        $this->table_name = 'comments';
        
        $this->model_attributes = array(
            
            array('id', 'id', 'int'),
            array('article_id', 'Article', 'int'),
            array('user_name', 'Name', 'varchar'),
            array('user_email', 'Email', 'varchar'),
            array('user_comment', 'Comment', 'text'),
            array('user_webiste', 'Website', 'varchar'),
            array('image', 'Image', 'varchar'),
            array('entry_datetime', 'Date', 'int')

        );
        
        
        $this->db_fields = $this->model_attributes;
        
        $this->admin_ignored_attributes = array();
        
        $this->db_engine = 'innodb';
        
        
    }
    
    protected function generate_payments() {
            
        $this->model_name = 'Payment';
        $this->model_extends = 'Core';
        $this->admin_url = '/admin/';
        $this->table_name = 'payments';
        
        $this->model_attributes = array(
            
            array('id', 'id', 'int'),
            array('player_id', 'Player', 'int'),
            array('event_id', 'Event', 'int'),
            array('datetime_create', 'Created', 'datetime'),
            array('amount', 'Amount Paid', 'float'),
            array('billing_first_name', 'Billing First Name', 'varchar'),
            array('billing_last_name', 'Billing Last Name', 'varchar'),

        );
        
        
        $this->db_fields = $this->model_attributes;
        
        $this->admin_ignored_attributes = array();
        
        $this->db_engine = 'innodb';
        
        
    }
    
    protected function generate_events() {
            
        $this->model_name = 'Event';
        $this->model_extends = 'Core';
        $this->admin_url = '/admin/';
        $this->table_name = 'events';
        
        $this->model_attributes = array(
            
            array('id', 'id', 'int'),
            array('event_type_id', 'Event Type', 'int'),
            array('title', 'Title', 'varchar'),
            array('description', 'Description', 'text'),
            array('date', 'Date', 'varchar'),
            array('image', 'Image', 'varchar'),
            array('max_registrants', 'Max Registrants', 'int'),
            array('cost_per_player', 'Cost Per Player', 'float'),
            array('cost_per_team', 'Cost Per Team', 'float')

        );
        
        
        $this->db_fields = $this->model_attributes;
        
        $this->admin_ignored_attributes = array();
        
        $this->db_engine = 'innodb';
        
        
    }
    
    protected function generate_event_types() {
            
        $this->model_name = 'Eventtype';
        $this->model_extends = 'Core';
        $this->admin_url = '/admin/';
        $this->table_name = 'event_types';
        
        $this->model_attributes = array(
            
            array('id', 'id', 'int'),
            array('type', 'Type', 'varchar')


        );
        
        
        $this->db_fields = $this->model_attributes;
        
        $this->admin_ignored_attributes = array();
        
        $this->db_engine = 'innodb';
        
        
    }
    
    protected function generate_pages() {
            
        $this->model_name = 'Page';
        $this->model_extends = 'Core';
        $this->admin_url = '/admin/';
        $this->table_name = 'pages';
        
        $this->model_attributes = array(
            
            array('id', 'id', 'int'),
            array('title', 'Title', 'varchar'),
            array('body', 'Title', 'varchar'),
            array('slug', 'URL Slug', 'varchar')


        );
        
        
        $this->db_fields = $this->model_attributes;
        
        $this->admin_ignored_attributes = array();
        
        $this->db_engine = 'innodb';
        
        
    }
    
    public function render_view() {
        
        $output = '<h3>Core Model</h3><hr />';
        $output .= $this->generate_core_model();
        $output .= '<h3>Model</h3><hr />';
        $output .= $this->generate_model();
        
        $output .= '<h3>Controllers</h3><hr />';
        $output .= $this->generate_controllers();
        
        $output .= '<h3>Admin</h3><hr />';
        $output .= $this->generate_views();
        
        $output .= '<h3>Post</h3><hr />';
        $output .= $this->generate_post();
        
    
        $output .= '<h3>Routes</h3><hr />';
        $output .= $this->generate_routes();
        
        $output .= '<h3>SQL</h3><hr />';
        $output .= $this->generate_sql();
        
        if($this->notices){
            $output .= '<h3>Notices</h3><hr />';
            $output .= '<ul>';
            foreach($this->notices as $notice){
                $output .= "<li>" . $notice . "</li>";
            }
            $output .= '</ul>';
        }
        
        
        return $output;
    
        
    }
    
    private function generate_core_model() {
        
        $output = $this->pre_open();
        $output .= "&lt;?php\n";
        $output .= "class Core_".$this->model_name."_Model extends ".$this->model_extends."_Model {\n\n";
        $output .= "\tprotected static \$table_name = '".$this->table_name."';\n";
        $output .= "\tprotected static \$db_fields = array(\n";
        foreach ($this->db_fields as $key=>$db_field) {
            if ($key == (sizeof($this->db_fields)-1)) {
                $output .= "\t\t'".$db_field[0]."'\n";
            } else {
                $output .= "\t\t'".$db_field[0]."',\n";   
            }
        }
        $output .= "\t);\n\n";
        foreach ($this->model_attributes as $model_attribute) {
            $output .= "\tprotected \$".$model_attribute[0].";\n";
        }
        $output .= "\n";
        $output .= "\tfunction __construct() {\n";
        $output .= "\t\tparent::__construct();\n";
        $output .= "\t}\n\n";
        foreach ($this->model_attributes as $model_attribute) {
            $output .= "\tpublic function get_".$model_attribute[0]."() {\n";
            $output .= "\t\treturn \$this->".$model_attribute[0].";\n";
            $output .= "\t}\n\n";
            $output .= "\tpublic function set_".$model_attribute[0]."(\$".$model_attribute[0].") {\n";
            $output .= "\t\t\$this->".$model_attribute[0]." = \$".$model_attribute[0].";\n";
            $output .= "\t}\n\n";
        }
        $output .= "}\n?&gt;";
        $output .= $this->pre_close();
        
        
        $directory = PRIVATE_ROOT . "core/models";
        $file = "core_" . strtolower($this->model_name) . "_model.php";
        $this->write_file($directory, $file, $output);
        
        return $output;
        
    }
    
    
     private function generate_model() {
        
        $output = $this->pre_open();
        $output .= "&lt;?php\n";
        $output .= "class ".$this->model_name."_Model extends Core_".$this->model_name."_Model {\n\n";
        $output .= "\tfunction __construct() {\n";
        $output .= "\t\tparent::__construct();\n";
        $output .= "\t}\n\n";
        
        $output .= "}\n?&gt;";
        $output .= $this->pre_close();
        
        $directory = PRIVATE_ROOT . "models";
        $file = strtolower($this->model_name) . "_model.php";
        
        if(is_file($directory ."/". $file)){
            $this->notices[] = "Did not overwrite ".$this->model_name. " shim (" . $directory ."/". $file . ")";
        } else {
            $this->write_file($directory, $file, $output);
        }
        
        return $output;
        
     }
    
    
    
    
    private function generate_controllers() {
        
        
        $output .= '<h4>Controller - Many</h4><hr />';
        $output .= $this->generate_controller_many();
        
        $output .= '<h4>Controller - Edit</h4><hr />';
        $output .= $this->generate_controller_edit();
        
        $output .= '<h4>Controller - Add</h4><hr />';
        $output .= $this->generate_controller_add();
        
        return $output;
        
    }
    
    private function generate_views() {
        
        
        $output .= '<h4>View - Many</h4><hr />';
        $output .= $this->generate_view_many();
        
        $output .= '<h4>View - Single</h4><hr />';
        $output .= $this->generate_view_single();
        
        return $output;
        
    }
    
    private function generate_post() {
        
        
        $output .= '<h4>Post Controller</h4><hr />';
        $output .= $this->generate_post_controller();
        
        
        $output .= '<h4>Delete Controller</h4><hr />';
        $output .= $this->generate_delete_controller();
        
    
        return $output;
        
    }
    
    private function generate_sql() {
        
        $output = $this->pre_open();
        $output .= "CREATE TABLE `". DB_NAME ."`.`". $this->table_name ."`(\n";
        
        $l = sizeof($this->db_fields);
        foreach($this->db_fields as $field){
            $i++;
            
            $output .= "`". $field[0] ."` " . strtoupper($field[2]);
            
            if($field[2] == 'varchar'){
                $output .= "( 255 )";
            }
            
            $output.= " NOT NULL";
            
            if($field[0] == 'id') { $output .= " AUTO_INCREMENT PRIMARY KEY"; }
            if($field[0] == 'entry_date_time') { $output .= " DEFAULT CURRENT_TIMESTAMP"; }
     
            
            if($i < $l){ $output .= ","; }
            
            $output .= "\n";
            
            
        }
        
        $output .= ") ENGINE = " . strtoupper($this->db_engine) . ";";
        
        $output .= $this->pre_close();
        
        $this->write_database($output);
        
        return $output;
        
    }
    
    
    
    
    private function generate_controller_many() {
        
        
        $output = $this->pre_open();
        $output .= "&lt;?php\n";
        $output .= "class Admin_" . $this->model_name . "_Controller extends Admin_Controller {\n\n";
        $output .= "\tfunction __construct(\$uri, \$data) {\n";
        $output .= "\t\tparent::__construct(\$uri, \$data);\n";
        $output .= "\t\t\$this->title .= ' | " . $this->model_name . "s';\n";
        $output .= "\t}\n\n";
        
        $output .= "\tprotected function content_view() {\n";
        $output .= "\t\t\$" . $this->table_name . " = " . $this->model_name . "_Model::find_all();\n";
        $output .= "\t\t\$this->content_view->" . strtolower($this->model_name) . "s = \$" . $this->table_name .";\n\n";
        $output .= "\t\treturn \$this->content_view->capture('admin_". $this->table_name ."_view.php');\n";
        $output .= "\t}\n\n";
        
        $output .= "}\n";
        $output .= "?&gt;";
        $output .= $this->pre_close();
        
        $directory = PRIVATE_ROOT . "controllers/admin/".strtolower($this->model_name);
        $file = "admin_" . strtolower($this->model_name) . "_controller.php";
        $this->write_file($directory, $file, $output);
        
        return $output;
        
        
    }
    
    private function generate_controller_edit() {
        
        $output = $this->pre_open();
        $output .= "&lt;?php\n";
        $output .= "class Admin_" . $this->model_name . "_Edit_Controller extends Admin_" . $this->model_name . "_Controller {\n\n";
        $output .= "\tfunction __construct(\$uri, \$data) {\n";
        $output .= "\t\tparent::__construct(\$uri, \$data);\n";
        $output .= "\t\t\$this->title .= ' | Edit';\n\n";
        
        $output .= "\t\tif (is_numeric(\$data['". strtolower($this->model_name) ."_id'])) {\n";
        $output .= "\t\t\t\$" . strtolower($this->model_name) . " = " . $this->model_name . "_Model::find_by_id(\$data['". strtolower($this->model_name) ."_id']);\n";
        $output .= "\t\t\tif(\$" . strtolower($this->model_name) . " == null){ ";
        $output .= "redirect_to('". $this->admin_url . strtolower($this->model_name) . "s');}\n";
        $output .= "\t\t\t\$this->content_view->" . strtolower($this->model_name) . " = \$" . strtolower($this->model_name) . ";\n";
        $output .= "\t\t} else {\n";
        $output .= "\t\t\t\$this->content_view->". strtolower($this->model_name) . " = new " . $this->model_name . "_Model;\n";
        $output .= "\t\t}\n\n";
        
        
        $output .= "\t}\n\n";
        
        $output .= "\tprotected function content_view() {\n";
        
        $output .= "\t\treturn \$this->content_view->capture('admin_". strtolower($this->model_name) ."_view.php');\n";
        $output .= "\t}\n";
        $output .="}\n";
        $output .= "?&gt;";
        $output .= $this->pre_close();
        
        $directory = PRIVATE_ROOT . "controllers/admin/".strtolower($this->model_name).'/edit';
        $file = "admin_" . strtolower($this->model_name) . "_edit_controller.php";
        $this->write_file($directory, $file, $output);

        return $output;
        
        
        
    }
    
    private function generate_controller_add() {
        
        $output = $this->pre_open();
        $output .= "&lt;?php\n";
        $output .= "class Admin_" . $this->model_name . "_Add_Controller extends Admin_" . $this->model_name . "_Controller {\n\n";
        $output .= "\tfunction __construct(\$uri, \$data) {\n";
        $output .= "\t\tparent::__construct(\$uri, \$data);\n";
        $output .= "\t\t\$this->title .= ' | Add';\n";
        $output .= "\t}\n\n";
        
        $output .= "\tprotected function content_view() {\n";
       
        
        $output .= "\t\treturn \$this->content_view->capture('admin_". strtolower($this->model_name) ."_view.php');\n";
        $output .= "\t}\n";
        $output .="}\n";
        $output .= "?&gt;";
        $output .= $this->pre_close();
        
        $directory = PRIVATE_ROOT . "controllers/admin/". strtolower($this->model_name) ."/add";
        $file = "admin_" . strtolower($this->model_name) . "_add_controller.php";
        $this->write_file($directory, $file, $output);
   
        return $output;
     
    }    
    
    private function generate_view_many() {
        
        $output = $this->pre_open();
        $output .= "&lt;div class=\"wrapper admin\"&gt;\n";
        $output .= "\t&lt;div class=\"title\"&gt;Manage " . $this->model_name . "s&lt;/div&gt;\n\n";
        
        $output .= "\t&lt;div class=\"list_all\"&gt;\n";
        $output .= "\t\t&lt;table&gt\n";
        $output .= "\t\t\t&lt;thead&gt\n";
        
        foreach ($this->model_attributes as $model_attribute) {
            if(!in_array($model_attribute[0], $this->admin_ignored_attributes)){
                $output .= "\t\t\t\t&lt;th&gt". $model_attribute[1] ."&lt;/th&gt\n";
            }
        }
        $output .= "\t\t\t\t&lt;th&gtEdit&lt;/th&gt\n";
        $output .= "\t\t\t\t&lt;th&gtDelete&lt;/th&gt\n";
        
        $output .= "\t\t\t&lt;/thead&gt\n";
        $output .= "\t\t\t&lt;tbody&gt\n";
        $output .= "\t\t\t&lt;?php if(\$this->" . strtolower($this->model_name) . "s): ?&gt;\n";
        $output .= "\t\t\t\t&lt;?php foreach(\$this->" . strtolower($this->model_name) . "s as \$" . strtolower($this->model_name) . "): ?&gt;\n";
        
        $output .= "\t\t\t\t\t&lt;tr id=\"" . strtolower($this->model_name) . "_&lt;?php echo \$" . strtolower($this->model_name) . "->get_id();?&gt;\"&gt;\n"; 
        
        foreach ($this->model_attributes as $model_attribute) {
            if(!in_array($model_attribute[0], $this->admin_ignored_attributes)){
                $output .= "\t\t\t\t\t\t&lt;td class=\"" . $model_attribute[0] . "\"&gt;&lt;?php echo \$" . strtolower($this->model_name) ."->get_" . $model_attribute[0] . "();?&gt;&lt/td&gt;\n";
            }
        }
        
         $output .= "\t\t\t\t\t\t&lt;td class=\"edit\"&gt;&lt;a href=\"/admin/". strtolower($this->model_name) ."/edit/&lt;?php echo \$" . strtolower($this->model_name) ."->get_id();?&gt;\" class=\"btn primary\"&gt;Edit&lt;/a&gt;&lt/td&gt;\n";
         $output .= "\t\t\t\t\t\t&lt;td class=\"delete\"&gt;&lt;a href=\"/admin/". strtolower($this->model_name) ."/delete/&lt;?php echo \$" . strtolower($this->model_name) ."->get_id();?&gt;\" class=\"btn danger\"&gt;Delete&lt;/a&gt;&lt/td&gt;\n";
        
        
        
        $output .= "\t\t\t\t\t&lt;/tr&gt;\n";
        $output .= "\t\t\t\t&lt;?php endforeach; ?&gt;\n";
        $output .= "\t\t\t&lt;?php endif; ?&gt;\n";
        $output .= "\t\t\t&lt;/tbody&gt\n";
        
        $output .= "\t\t&lt/table&gt;\n";
        $output .= "\t&lt/div&gt;\n";
        
        //$output .=" \t&lt;a href=\"" . $this->admin_url . "\" class=\"back_link foot\"&gt;Back&lt;/a&gt;\n";
        
        
        $output .= "\t&lt;div class=\"actions\"&gt;\n";
        $output .= "\t\t&lt;div class=\"action_buttons\"&gt;\n";
        $output .= "\t\t\t&lt;a href=\"/admin/\" class=\"btn\"&gt;Back&lt;/a&gt;\n";
        $output .= "\t\t\t&lt;a href=\"/admin/". strtolower($this->model_name)  ."/add\" class=\"btn primary\"&gt;Create New " . $this->model_name . "&lt;/a&gt;\n";
        $output .= "\t\t&lt/div&gt;\n";
        $output .= "\t&lt/div&gt;\n";
        
        $output .= "&lt;/div&gt;\n";
        
        $output .= $this->pre_close();
        
        $directory = PRIVATE_ROOT . "views";
        $file = "admin_" . strtolower($this->model_name) . "s_view.php";
        $this->write_file($directory, $file, $output, true);
        
        
        return $output;
    
        
    }
    
    private function generate_view_single() {
        
        $output = $this->pre_open();
        
        $output .= "&lt;?php\n";
        $output .= "if(\$this->" . strtolower($this->model_name) . ") {\n";
        
        foreach ($this->model_attributes as $model_attribute) {
            $output .= "\t\$" . $model_attribute[0] . " = \$this->" . strtolower($this->model_name) . "->get_" .  $model_attribute[0] . "();\n";
        }
        
        $output .= "}\n";
        $output .= "?&gt;\n\n";
        $output .= "&lt;div class=\"wrapper admin\"&gt;\n";
       
        $output .= "\t&lt;form name=\"" . strtolower($this->model_name) . "_form\" method=\"post\" action=\"/admin/". strtolower($this->model_name)  ."/post\" id=\"" . strtolower($this->model_name) . "_form\"&gt;\n";
        //$output .= "\t\t&lt;input type=\"hidden\" id=\"id\" name=\"id\" value=\"&lt;?php echo \$id;?&gt;\" /&gt;\n\n";
        
        foreach ($this->model_attributes as $model_attribute) {
            if(!in_array($model_attribute[0], $this->admin_ignored_attributes)){
                
                if($model_attribute[0] != 'id'){
                    $output .= "\t\t&lt;h3&gt;" . $model_attribute[1] . "&lt;/h3&gt;\n";
                }
                
                if($model_attribute[0] == 'id'){
                    
                    $output .= "\t\t&lt;input type=\"hidden\" id=\"". $model_attribute[0] ."\" name=\"". $model_attribute[0] ."\" value=\"&lt;?php echo \$". $model_attribute[0]  .";?&gt;\" /&gt;\n\n";
                
                    
                } else if($model_attribute[2] == 'varchar' || $model_attribute[2] == 'int' || $model_attribute[2] == 'datetime' || $model_attribute[2] == '' || $model_attribute[2] == 'float'){
                
                    $output .= "\t\t&lt;input type=\"text\" id=\"". $model_attribute[0] ."\" name=\"". $model_attribute[0] ."\" value=\"&lt;?php echo \$". $model_attribute[0]  .";?&gt;\" /&gt;\n\n";
                
                } else if ($model_attribute[2] == 'text'){
                    
                    $output .= "\t\t&lt;textarea id=\"". $model_attribute[0] ."\" name=\"". $model_attribute[0] ."\"&gt;&lt;?php echo \$". $model_attribute[0]  .";?&gt;&lt;/textarea&gt;\n"; 
                    
                } else if ($model_attribute[2] == 'bool'){
                    
                    $output .= "\t\t&lt;input type=\"checkbox\" &lt;?php if(\$" .$model_attribute[0] . " == 1) echo 'checked=\"checked\"';?&gt; id=\"". $model_attribute[0] ."\" name=\"". $model_attribute[0] ."\" value=\"1\" /&gt;\n\n";
                
                    
                }
            
            }
        }
        
        $output .= "\t\t&lt;div class=\"actions\"&gt;\n";
        $output .= "\t\t\t&lt;div class=\"action_buttons\"&gt;\n";
        $output .= "\t\t\t\t&lt;a href=\"/admin/". strtolower($this->model_name)  ."s\" class=\"btn\"&gt;Back&lt;/a&gt;\n";
        $output .= "\t\t\t\t&lt;input id=\"submit_". strtolower($this->model_name)  ."\" type=\"submit\" class=\"btn primary\" value=\"Save\" /&gt;\n";
        $output .= "\t\t\t&lt/div&gt;\n";
        $output .= "\t\t&lt/div&gt;\n";
        
        $output .= "\t&lt;/form&gt;\n";
        
        $output .= "&lt;/div&gt;\n";

        $output .= $this->pre_close();
        
        $directory = PRIVATE_ROOT . "views";
        $file = "admin_" . strtolower($this->model_name) . "_view.php";
        $this->write_file($directory, $file, $output, true);
        
        return $output;
        
        
        
    }
    
    private function generate_routes() {
        
        $output = $this->pre_open();
        
        //main
        $output .= "\t\t\t'Admin_".$this->model_name."_Controller' => array(\n";
        $output .= "\t\t\t\tarray('admin', '".strtolower($this->model_name)."'),\n";
        $output .= "\t\t\t\tarray('admin', '".strtolower($this->model_name)."s')\n";
        $output .= "\t\t\t),\n";
        
        //add
        $output .= "\t\t\t'Admin_".$this->model_name."_Add_Controller' => array(\n";
        $output .= "\t\t\t\tarray('admin', '".strtolower($this->model_name)."', 'add')\n";
        $output .= "\t\t\t),\n";
        
        //edit
        $output .= "\t\t\t'Admin_".$this->model_name."_Edit_Controller' => array(\n";
        $output .= "\t\t\t\tarray('admin', '".strtolower($this->model_name)."', 'edit', '{is_int:". strtolower($this->model_name) ."_id}')\n";
        $output .= "\t\t\t),\n";
        
        //post
        $output .= "\t\t\t'Admin_".$this->model_name."_Post_Controller' => array(\n";
        $output .= "\t\t\t\tarray('admin', '".strtolower($this->model_name)."', 'post')\n";
        $output .= "\t\t\t),\n";
        
        //delete
        $output .= "\t\t\t'Admin_".$this->model_name."_Delete_Controller' => array(\n";
        $output .= "\t\t\t\tarray('admin', '".strtolower($this->model_name)."', 'delete', '{is_int:". strtolower($this->model_name) ."_id}')\n";
        $output .= "\t\t\t),\n";

        $output .= $this->pre_close();
    
        $this->write_routes($output);
            
        return $output;
    }
    
    

    
    private function generate_post_controller() {
        
        $output = $this->pre_open();
        
        $output .= "&lt;?php\n\n";
        $output .= "class Admin_" . ucwords($this->model_name) . "_Post_Controller extends Admin_".ucwords($this->model_name)."_Controller {\n\n";
        $output .= "\tfunction __construct(\$uri, \$data) {\n";
        $output .= "\t\tparent::__construct(\$uri, \$data);\n";
        $output .= "\t\t\$this->title = null;\n";
        $output .= "\t}\n\n";
        
        $output .= "\tfunction content_view() {\n\n";
        $output .= "\t\tglobal \$session;\n\n";
        
        foreach ($this->model_attributes as $model_attribute) {
            if(!in_array($model_attribute[0], $this->admin_ignored_attributes)){
                $output .= "\t\tif(isset(\$_POST['". $model_attribute[0] ."'])) { \$". $model_attribute[0] ." = \$_POST['". $model_attribute[0] ."']; }\n";
            }
        }
        
        $output .= "\n";
        $output .= "\t\tif(is_numeric(\$id) && \$id > 0) {\n";
        $output .= "\t\t\t\$" . strtolower($this->model_name) . " = " . $this->model_name . "_Model::find_by_id(\$id);\n";
        $output .= "\t\t} else {\n";
        $output .= "\t\t\t\$" . strtolower($this->model_name) . " = new " . $this->model_name . "_Model();\n";
        $output .= "\t\t}\n\n";
        
        
        
        foreach ($this->model_attributes as $model_attribute) {
            if(!in_array($model_attribute[0], $this->admin_ignored_attributes) && ($model_attribute[0] != 'id') ){
                $output .= "\t\tif(isset(\$". $model_attribute[0] .")) { \$" . strtolower($this->model_name) . "->set_" . $model_attribute[0] . "(\$". $model_attribute[0] ."); }\n";
            }
        }
        
        $output .= "\n";
        $output .= "\t\t$" . strtolower($this->model_name) . "->save();\n\n";
        $output .= "\t\t\$this->add_flash('". ucwords($this->model_name) ." Saved Successfully');\n";
        $output .= "\t\tredirect_to('/admin/". strtolower($this->model_name) ."s');\n";
        $output .= "\t}\n";
        $output .= "}\n";
        
        $output .= "?&gt;";
        $output .= $this->pre_close();

        $directory = PRIVATE_ROOT . "controllers/admin/". strtolower($this->model_name) ."/post";
        $file = "admin_" . strtolower($this->model_name) . "_post_controller.php";
        $this->write_file($directory, $file, $output);
        

        return $output;
    
    
    
        
        
        
    }
    
    private function generate_delete_controller() {
        
        $output = $this->pre_open();
        
        $output .= "&lt;?php\n\n";
        $output .= "class Admin_" . ucwords($this->model_name) . "_Delete_Controller extends Admin_".ucwords($this->model_name)."_Controller {\n\n";
        $output .= "\tfunction __construct(\$uri, \$data) {\n";
        $output .= "\t\tparent::__construct(\$uri, \$data);\n";
        $output .= "\t\t\$this->title = null;\n\n";
        $output .= "\t\t\$" . strtolower($this->model_name) . " = " . ucwords($this->model_name) . "_Model::find_by_id(\$data['". strtolower($this->model_name) ."_id']);\n";
        $output .= "\t\t\$" . strtolower($this->model_name) . "->delete();\n";
        $output .= "\t\tredirect_to('/admin/" . strtolower($this->model_name) . "s');\n";
        $output .= "\t}\n\n";
        
        $output .= "\tfunction content_view() {\n\n";
        $output .= "\t}\n";
      
        $output .= "}\n";
        
        $output .= "?&gt;";
        $output .= $this->pre_close();

        $directory = PRIVATE_ROOT . "controllers/admin/". strtolower($this->model_name) ."/delete";
        $file = "admin_" . strtolower($this->model_name) . "_delete_controller.php";
        $this->write_file($directory, $file, $output);
        
        return $output;
        
        
    }
    
    private function generate_ajax_js() {
        
        $output = $this->pre_open();
        
        
        $output .= "function submit_" . strtolower($this->model_name) . "_form() {\n";
        $output .= "\t\$(\"#submit_" . strtolower($this->model_name) . "_button\").attr(\"disabled\", \"disabled\");\n";
        $output .= "\tvar datastring = \$(\"". strtolower($this->model_name) . "_form\").serialize();\n\n";
        $output .= "\t\$.ajax({\n";
        $output .= "\t\turl: \"/ajax/post/". strtolower($this->model_name) . "\",\n";
        $output .= "\t\ttype: \"post\",\n";
        $output .= "\t\tdata: datastring,\n";
        $output .= "\t\tsuccess: function(d) {\n";
        $output .= "\t\t\talert(\"Saved!\");\n";
        $output .= "\t\t\t\$(\"#submit_" . strtolower($this->model_name) . "button\").removeAttr(\"disabled\");\n\n";
        $output .= "\t\t\tif(isNumber(d)) {\n";
        $output .= "\t\t\t\twindow.location = \"" . $this->admin_url . strtolower($this->model_name) ."s/\"" . " + d;\n";
        $output .= "\t\t\t}\n";
        $output .= "\t\t}\n";
        $output .= "\t});\n";
        $output .= "}";
        
        $output .= $this->pre_close();
        
        return $output;
        
    }
    
    
    
    
    
    /* HELPERS */
    
    private function pre_open() {
        
        return "<pre>";
        
    }
    
    private function pre_close() {
        
        return "</pre>";
        
    }
   
   
    function write_routes($output){
        
        $str = str_replace('<pre>', '', $output);
        $str = str_replace('</pre>', '', $str);
        $str = str_replace('&lt;', '<', $str);
        $str = str_replace('&gt;', '>', $str);
        
        $file = PRIVATE_ROOT . "routes.php";
        $needle = "/*PIGEON_NEW*/";
        $header = "/*PIGEON_". ucwords($this->model_name) ."*/";
        
        $this->write_in_file($str, $file, $needle, $header);
        
    }
    
    
    function write_file($directory, $file, $output, $double = false) {
        
        
        if($this->data['action'] == 'w' || $this->data['action'] == 'wd'){

            if(!is_dir($directory)){
                mkdir($directory);
            }
                
            $file = $directory . "/" . $file;
            $fh = fopen($file, 'w') or die("CAN'T");
            
            $str = str_replace('<pre>', '', $output);
            $str = str_replace('</pre>', '', $str);
            $str = str_replace('&lt;', '<', $str);
            $str = str_replace('&gt;', '>', $str);
            
            if($double){
                $str = str_replace('&lt', '<', $str);
                $str = str_replace('&gt', '>', $str);
            }
            
            fwrite($fh, $str);
            fclose($fh);
            
            chmod($file, 0777);
        }
        
        
        
    }
    

    function write_in_file($output, $file, $needle, $header){
        
        $lines = file($file);
        $all_lines = implode('',$lines);

        $new_data = "\n\t\t\t".$header."\n" . $output . "\n\n\t\t\t" . $needle;
        
        if(strpos($all_lines, $header) === false){        
        
            $entry = str_replace($needle,$new_data,$all_lines);
            $fp = fopen($file,'w'); 
            $fw = fwrite($fp,$entry);
            fclose($fp);
            
            chmod($file, 0777);
        } 

    }
    
    
    function write_database($sql){
        
        if($this->data['action'] == 'd' || $this->data['action'] == 'wd'){

            $sql = str_replace('\n', '', $sql);
            $sql = str_replace('<pre>', '', $sql);
            $sql = str_replace('</pre>', '', $sql);
            
            global $database;
            
            $database->query($sql);
            
        }
        
    }
}

?>