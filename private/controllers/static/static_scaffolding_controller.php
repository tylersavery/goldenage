<?php

class Scaffolding_Controller extends Base_Controller {
    
    private $model_name;
    private $model_extends;
    private $model_attributes;
    private $admin_url;
    private $table_name;
    private $db_fields;
    private $admin_ignored_attributes;
    private $db_engine;
    
    function __construct($uri) {
        
        $this->model_name = 'Post';
        $this->model_extends = 'Base';
        $this->admin_url = '/admin/';
        $this->model_attributes = array(
            array('id', 'id', 'int'),
            array('title', 'Title', 'varchar'),
            array('author', 'Author', 'varchar'),
            array('body', 'Body', 'text'),
            array('active', 'Active', 'boolean')
            
            
            
           /* array('first_name', 'First Name', 'varchar'),
            array('last_name', 'Last Name', 'varchar'),
            array('email', 'Email', 'varchar'),
            array('bio', 'Bio', 'text'),
            array('age', 'Age', 'int'),
            array('entry_date_time', 'Date Created', 'timestamp'),
            array('paid', 'Paid', 'bool'),
            array('deleted', 'Deleted', 'bool')*/
        );
        
        $this->table_name = 'posts';
        $this->db_fields = array(
            array('id', 'id', 'int'),
            array('title', 'Title', 'varchar'),
            array('author', 'Author', 'varchar'),
            array('body', 'Body', 'text'),
            array('active', 'Active', 'boolean')
        );
        
        $this->admin_ignored_attributes = array(
            
            'deleted'
        );
        
        $this->db_engine = 'innodb';
        
    }
    
    public function render_view() {
        
        $output = '<h3>Model</h3><hr />';
        $output .= $this->generate_model();
        
        
        $output .= '<h3>Controllers</h3><hr />';
        $output .= $this->generate_controllers();
        
        $output .= '<h3>Admin</h3><hr />';
        $output .= $this->generate_views();
        
        $output .= '<h3>Ajax</h3><hr />';
        $output .= $this->generate_ajax();
        
    
        $output .= '<h3>Routes</h3><hr />';
        $output .= $this->generate_routes();
        
    
        
        $output .= '<h3>SQL</h3><hr />';
        $output .= $this->generate_sql();
        
        
        return $output;
        
    }
    
    private function generate_model() {
        
        $output = $this->pre_open();
        $output .= "&lt;?php\n";
        $output .= "class ".$this->model_name."_Model extends ".$this->model_extends."_Model {\n\n";
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
        
        return $output;
        
    }
    
    
    
    
    private function generate_controllers() {
        
        
        $output .= '<h4>Controller - Many</h4><hr />';
        $output .= $this->generate_controller_many();
        
        $output .= '<h4>Controller - Single</h4><hr />';
        $output .= $this->generate_controller_single();
        
        return $output;
        
    }
    
    private function generate_views() {
        
        
        $output .= '<h4>View - Many</h4><hr />';
        $output .= $this->generate_view_many();
        
        $output .= '<h4>View - Single</h4><hr />';
        $output .= $this->generate_view_single();
        
        return $output;
        
    }
    
    private function generate_ajax() {
        
        
        $output .= '<h4>Ajax PHP</h4><hr />';
        $output .= $this->generate_ajax_php();
        
        $output .= '<h4>Ajax JS</h4><hr />';
        $output .= $this->generate_ajax_js();
        
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
        
        return $output;
        
    }
    
    
    
    
    private function generate_controller_many() {
        
        
        $output = $this->pre_open();
        $output .= "&lt;?php\n";
        $output .= "class Admin_" . $this->model_name . "s_Controller extends " . $this->model_extends . " {\n\n";
        $output .= "\tfunction __construct(\$uri) {\n";
        $output .= "\t\tparent::__construct(\$uri);\n";
        $output .= "\t\t\$this->title .= ' | " . $this->model_name . "s';\n";
        $output .= "\t}\n\n";
        
        $output .= "\tprotected function content_view() {\n";
        $output .= "\t\t\$" . $this->table_name . " = " . $this->model_name . "_Model::find_all();\n";
        $output .= "\t\t\$this->content_view->" . strtolower($this->model_name) . " = \$" . $this->table_name .";\n\n";
        $output .= "\t\t return \$this->content_view->capture('admin_". $this->table_name ."_view.tpl.php');\n";
        $output .= "\t}\n\n";
        
        $output .= "}\n";
        $output .= "?&gt;";
        $output .= $this->pre_close();
        
        
        return $output;
        
        
    }
    
    private function generate_controller_single() {
        
        $output = $this->pre_open();
        $output .= "&lt;?php\n";
        $output .= "class Admin_" . $this->model_name . "_Controller extends " . $this->model_extends . " {\n\n";
        $output .= "\tfunction __construct(\$uri) {\n";
        $output .= "\t\tparent::__construct(\$uri);\n";
        $output .= "\t\t\$this->title .= ' | " . $this->model_name . "';\n";
        $output .= "\t}\n\n";
        
        $output .= "\tprotected function content_view() {\n";
        $output .= "\t\tif (is_numeric(\$this->uri[2])) {\n";
        $output .= "\t\t\t\$" . strtolower($this->model_name) . " = " . $this->model_name . "::find_by_id(\$this->uri[2]);\n";
        $output .= "\t\t\tif(\$" . strtolower($this->model_name) . " == null)\n";
        $output .= "\t\t\t\tredirect_to('". $this->admin_url . strtolower($this->model_name) . "s');\n";
        $output .= "\t\t\t\$this->content_view->" . strtolower($this->model_name) . " = \$" . strtolower($this->model_name) . ";\n";
        $output .= "\t\t} else {\n";
        $output .= "\t\t\t\$this->content_view->". strtolower($this->model_name) . " = new " . $this->model_name . "_Model;\n";
        $output .= "\t\t}\n\n";
        
        $output .= "\t\treturn \$this->content_view->capture('admin_". strtolower($this->model_name) ."_view.tpl.php');\n";
        $output .= "\t}\n";
        $output .="}\n";
        $output .= "?&gt;";
        $output .= $this->pre_close();
        
        
        
        return $output;
        
        
        
    }
    
    private function generate_view_many() {
        
        $output = $this->pre_open();
        $output .= "&lt;div class=\"wrapper admin\"&gt;\n";
        $output .= "\t&lt;a href=\"" . $this->admin_url . "\" class=\"back_link head\"&gt;Back&lt;/a&gt;\n";
        $output .= "\t&lt;div class=\"title\"&gt;Manage " . $this->model_name . "s&lt;div&gt;\n\n";
        
        $output .= "\t&lt;div class=\"list_all\"&gt;\n";
        $output .= "\t\t&lt;input type=\"text\" placeholder=\"search\" id=\"search\" /&gt;&lt;br /&gt;\n";
        $output .= "\t\t&lt;table&gt\n";
        $output .= "\t\t\t&lt;thead&gt\n";
        
        foreach ($this->model_attributes as $model_attribute) {
            if(!in_array($model_attribute[0], $this->admin_ignored_attributes)){
                $output .= "\t\t\t\t&lt;th&gt". $model_attribute[1] ."&lt;/th&gt\n";
            }
        }
        
        $output .= "\t\t\t&lt;/thead&gt\n";
        $output .= "\t\t\t&lt;tbody&gt\n";
        $output .= "\t\t\t&lt;?php foreach(\$this->" . strtolower($this->model_name) . "s as \$" . strtolower($this->model_name) . "): ?&gt;\n";
        
        $output .= "\t\t\t\t&lt;tr id=\"" . strtolower($this->model_name) . "_&lt;?php echo \$" . strtolower($this->model_name) . "->get_id();?&gt;\"&gt;\n"; 
        
        foreach ($this->model_attributes as $model_attribute) {
            if(!in_array($model_attribute[0], $this->admin_ignored_attributes)){
                $output .= "\t\t\t\t\t&lt;td class=\"" . $model_attribute[0] . "\"&gt;&lt;?php echo \$" . strtolower($this->model_name) ."->get_" . $model_attribute[0] . "();?&gt;&lt/td&gt;\n";
            }
        }
        
        
        $output .= "\t\t\t\t&lt;/tr&gt;\n";
        $output .= "\t\t\t&lt;?php endforeach; ?&gt;\n";
        $output .= "\t\t\t&lt;/tbody&gt\n";
        
        $output .= "\t\t&lt/table&gt;\n";
        $output .= "\t&lt/div&gt;\n";
        
        $output .=" \t&lt;a href=\"" . $this->admin_url . "\" class=\"back_link foot\"&gt;Back&lt;/a&gt;\n";
        
        
        $output .= "&lt;/div&gt;\n";
        
        $output .= $this->pre_close();
        
        
        return $output;
        
    }
    
    private function generate_view_single() {
        
        $output = $this->pre_open();
        
        $output .= "&lt;?php\n";
        $output .= "if(\$this->" . strtolower($this->model_name) . "->get_id() &gt; 0) {\n";
        
        foreach ($this->model_attributes as $model_attribute) {
            $output .= "\t\$" . $model_attribute[0] . " = \$this->" . strtolower($this->model_name) . "->get_" .  $model_attribute[0] . "();\n";
        }
        
        $output .= "}\n";
        $output .= "?&gt;\n\n";
        $output .= "&lt;div class=\"wrapper admin\"&gt;\n";
        $output .= "\t&lt;a href=\"" . $this->admin_url . strtolower($this->model_name) . "s\" class=\"back_link head\"&gt;Back&lt;/a&gt;\n";
        $output .= "\t&lt;form name=\"" . strtolower($this->model_name) . "_form\" id=\"" . strtolower($this->model_name) . "_form\"&gt;\n";
        $output .= "\t\t&lt;input type=\"hidden\" id=\"id\" name=\"id\" value=\"&lt;?php echo \$id;?&gt;\" /&gt;\n\n";
        
        foreach ($this->model_attributes as $model_attribute) {
            if(!in_array($model_attribute[0], $this->admin_ignored_attributes)){
                
                $output .= "\t\t&lt;h3&gt;" . $model_attribute[1] . "&lt;/h3&gt;\n";
                
                if($model_attribute[2] == 'varchar' || $model_attribute[2] == 'int' || $model_attribute[2] == 'timestamp' || $model_attribute[2] == ''){
                
                    $output .= "\t\t&lt;input type=\"text\" id=\"". $model_attribute[0] ."\" name=\"". $model_attribute[0] ."\" value=\"&lt;?php echo \$". $model_attribute[0]  .";?&gt;\" /&gt;\n\n";
                
                } else if ($model_attribute[2] == 'text'){
                    
                    $output .= "\t\t&lt;textarea id=\"". $model_attribute[0] ."\" name=\"". $model_attribute[0] ."\"&gt;&lt;?php echo \$". $model_attribute[0]  .";?&gt;&lt;/textarea&gt;\n"; 
                    
                } else if ($model_attribute[2] == 'bool'){
                    
                    $output .= "\t\t&lt;input type=\"checkbox\" &lt;?php if(\$this->". strtolower($this->model_name) . "->get_" . $model_attribute[0] . "() == 1) echo 'selected=\"selected\"';?&gt; id=\"". $model_attribute[0] ."\" name=\"". $model_attribute[0] ."\" value=\"1\" /&gt;\n\n";
                
                    
                }
            
            }
        }
        
        $output .= "\t\t&lt;input type=\"button\" id=\"submit_" . strtolower($this->model_name) . "_button\" name=\"submit_" . strtolower($this->model_name) . "_button\" value=\"Save\" /&gt;\n"; 
        $output .= "\t&lt;/form&gt;\n";
        $output .= "&lt;/div&gt;\n";

        $output .= $this->pre_close();
        
        
        return $output;
        
        
        
    }
    
    private function generate_routes() {
        
        $output = '<h4>Admin Routes</h4><hr />';
        $output .= $this->generate_admin_routes();
        
        $output .= '<h4>Ajax Routes</h4><hr />';
        $output .= $this->generate_ajax_routes();
        
        return $output;
    }
    
    
    private function generate_admin_routes() {
        
        $output = $this->pre_open();
        
        $output .= "case '" . strtolower($this->model_name) . "s':\n";
        $output .= "\tswitch(\$uri[2]) {\n\n";
        $output .= "\t\tcase '':\n";
        $output .= "\t\t\t\$this->controller = new Admin_" . $this->model_name . "s_Controller(\$uri);\n";
        $output .= "\t\t\tbreak;\n\n";
        $output .= "\t\tcase 'new':\n";
        $output .= "\t\t\t\$this->controller = new Admin_" . $this->model_name . "_Controller(\$uri);\n";
        $output .= "\t\t\tbreak;\n\n";
        $output .= "\t\tcase (is_numeric(\$uri[2])):\n";
        $output .= "\t\t\t\$this->controller = new Admin_" . $this->model_name . "_Controller(\$uri);\n";
        $output .= "\t\t\tbreak;\n\n";
        $output .= "\t\tcase 'delete':\n";
        $output .= "\t\t\tswitch(\$uri[3]) {\n\n";
        $output .= "\t\t\t\tcase '':\n";
        $output .= "\t\t\t\t\tbreak;\n\n";
        $output .= "\t\t\t\tcase (is_numeric(\$uri[3])):\n";
        $output .= "\t\t\t\t\t\$this->controller = new Admin_" . $this->model_name . "_Delete_Controller(\$uri);\n";
        $output .= "\t\t\t\t\tbreak;\n\n";
        $output .= "\t\t\t}\n";
        $output .= "\t\t\tbreak;\n\n";
        $output .= "\tbreak;";

        
        $output .= $this->pre_close();
        
        return $output;
        
    }
    
    private function generate_ajax_routes() {
        
        $output = $this->pre_open();
        
        $output .= "case 'ajax':\n";
        $output .= "\tswitch(\$uri[1]) {\n";
        $output .= "\t\tcase 'post':\n";
        $output .= "\t\t\tswitch(\$uri[2]) {\n";
        
        
        $output .= "\t\t\t\tcase '" . strtolower($this->model_name) . "s':\n";

        $output .= "\t\t\t\t\t\$this->controller = new Ajax_Post_" . $this->model_name . "_Controller(\$uri);\n";
        $output .= "\t\t\t\t\tbreak;\n";
        $output .= "\t\t\t}\n";
        $output .= "\t\t\tbreak;\n";
        $output .= "\t}\n";
        $output .= "\tbreak;";
        $output .= $this->pre_close();
        
        return $output;
        
    }
    
    private function generate_ajax_php() {
        
        $output = $this->pre_open();
        
        $output .= "&lt;?php\n\n";
        $output .= "class Ajax_Post_" . $this->model_name . "_Controller extends Ajax_Controller\n\n";
        $output .= "\tfunction__construction(\$uri) {\n";
        $output .= "\t\tparent::__construct(\$uri);\n";
        $output .= "\t\t\$this->title = '';\n";
        $output .= "\t}\n\n";
        
        $output .= "\tfunction content_view() {\n\n";
        $output .= "\t\tglobal \$session;\n\n";
        
        foreach ($this->model_attributes as $model_attribute) {
            if(!in_array($model_attribute[0], $this->admin_ignored_attributes)){
                $output .= "\t\tif(isset(\$_POST['". $model_attribute[0] ."']) { \$". $model_attribute[0] ." = \$_POST['". $model_attribute[0] ."']; }\n";
            }
        }
        
        $output .= "\n";
        $output .= "\t\tif(is_numeric(\$id) && \$id > 0) {\n";
        $output .= "\t\t\t\$" . strtolower($this->model_name) . " = " . $this->model_name . "_Model::find_by_id(\$id);\n";
        $output .= "\t\t\t\$return = 'update';\n";
        $output .= "\t\t} else {\n";
        $output .= "\t\t\t\$" . strtolower($this->model_name) . " = new " . $this->model_name . "_Model();\n";
        $output .= "\t\t}\n\n";
        
        
        
        foreach ($this->model_attributes as $model_attribute) {
            if(!in_array($model_attribute[0], $this->admin_ignored_attributes) && ($model_attribute[0] != 'id') ){
                $output .= "\t\tif(isset(\$". $model_attribute[0] .")) { \$" . strtolower($this->model_name) . "->set_" . $model_attribute[0] . "(\$". $model_attribute[0] ."); }\n";
            }
        }
        
        $output .= "\n";
        $output .= "\t\tif($" . strtolower($this->model_name) . "->save()) {\n";
        $output .= "\t\t\treturn \$" . strtolower($this->model_name) . "->get_id();\n";
        $output .= "\t\t}\n\n";
        $output .= "\t}\n";
        $output .= "}\n";
        
        $output .= "?&gt;";
        $output .= $this->pre_close();

        
        
        $output .= $this->pre_close();
        
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
    
}

?>