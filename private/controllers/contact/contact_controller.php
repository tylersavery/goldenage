<?php
class Contact_Controller extends Static_Main_Controller {
    
    function __construct($uri, $data) {
        parent::__construct($uri, $data);
        
        redirect_to("/article/contact");

    }
    
    
    
   
}
?>