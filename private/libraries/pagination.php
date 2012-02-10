<?php
class Pagination{
    var $output = '';    
    var $options = array(
        'urlscheme' => '',
        'perpage' => '',
        'page' => '',
        'total' => '',
        'numlinks' => '',
        'nexttext' => 'Next',
        'prevtext' => 'Previous',
        'focusedclass' => '',
        'delimiter' => ', '
    );
    
    var $show_first = true;
    var $show_last = true;
   
   function set($who,$what){
       $this->output = '';
       $this->options[$who] = $what;
   }
   
   function checkValues(){
    
       $errors = array();
       
       if($this->options['perpage']=='') $errors[] = 'Invalid perpage value';
       if($this->options['page']=='') $errors[] = 'Invalid page value';
       if($this->options['total']=='') $errors[] = 'Invalid total value';
       if($this->options['numlinks']=='') $errors[] = 'Invalid numlinks value';
       
   }
   
   function display($return = false){
    
       $this->checkValues();
       
       if($this->output=='') $this->generateOutput();
       
       if(!$return) echo $this->output;
       
       else return $this->output;
       
   }
   
   function generateOutput(){
    
       $elements = array();
       $num_pages = ceil($this->options['total']/$this->options['perpage']);
       $front_links = ceil($this->options['numlinks']/2);
       $end_links = floor($this->options['numlinks']/2);
       
       if($this->options['page'] > $num_pages){ $this->set('page',1); }
       
       $start_page = max(1,($this->options['page']-$front_links+1));
       $end_page = min($this->options['numlinks'] + $start_page-1,$num_pages);

       if($start_page == 1){
            $this->show_first = false;
        }
           
        if($end_page == $num_pages){
            $this->show_last = false;
        }
           
       if($this->options['page'] > 1){
        
           $elements[] = $this->generate_link($this->options['page']-1,$this->options['prevtext']);
           if($this->show_first) {
            $elements[] = $this->generate_link(1,'First');
           }
           
       }
       
        
       for($i=$start_page;$i<=$end_page;$i++){
  
           $elements[] = $this->generate_link($i);
           
           
       }
       
       if($this->options['page'] < $num_pages){
            
            if($this->show_last) {
                $elements[] = $this->generate_link(ceil($this->options['total'] / $this->options['perpage']),'Last');
            }            
            
            $elements[] = $this->generate_link($this->options['page']+1,$this->options['nexttext']);
            
       }
       
       $this->output = implode($this->options['delimiter'],$elements);
   }
   
   function generate_link($page,$label=''){
    
       $url = str_replace('%page%',$page,$this->options['urlscheme']);
       
       if($label=='') $label=$page;
      
       $html = "<li ".(($this->options['focusedclass']!='' && $page == $this->options['page'])?"class=\"{$this->options['focusedclass']}\" ":"")."><a href=\"{$url}\">{$label}</a></li>";
       
       return $html;
    
   }
}
?>
