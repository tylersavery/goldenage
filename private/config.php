<?php

// define enviroment specific constants
switch(ENVIROMENT) {

    case 'goldenage.dev':
        define('MODE', 'DEVELOPMENT');
        define('DB_HOST', '127.0.0.1');
        define('DB_USER', 'root');
        define('DB_PASS', '');
        define('DB_NAME', 'goldenage');
        define('DB_SALT', 'b810687c692b88184eb11c6d29b5cda4');
        define('DEBUG', TRUE);
        define('MIN_JS', FALSE);
        define('URL', 'http://goldenage.dev/');
        define('FB_APP_ID', '');
        define('TWITTER_USER', 'tylersavery');
        define('TWITTER_PASS', 'telephone2');
        define('OAUTH_KEY', '2lC2LJVug5fxe7teDCiNg');
        define("OAUTH_SECRET", "GpJjSrb7QkhYV27tf0K21uVmAdIxIH1K94zDyPjKUY");
        define('OAUTH_TOKEN', '174715005-IfkxnLrLtNCoDuKM3GFXy6ePEitfehFfELF493cD');
        define('OAUTH_TOKEN_SECRET', 'ZQc3EpOamcoNULWVdUDZ02BHdZLJ2TAmdCJIHeR3E');
        define('FACEBOOK_APP_ID', '335461103134397');
        define('FACEBOOK_SECRET', '66ea3d5b748205921d0f000c30bdca17');
		define('USE_BITLY', FALSE);
        define('BITLY_KEY', 'R_959e115040ad6ebd8b0184a3c2e64735');
        define('BITLY_LOGIN', 'tylersavery');
        
        break;

 	case 'goldenage':
        define('MODE', 'DEVELOPMENT');
        define('DB_HOST', 'localhost');
        define('DB_USER', 'root');
        define('DB_PASS', 'artyarty87');
        define('DB_NAME', 'goldenage');
        define('DB_SALT', 'b810687c692b88184eb11c6d29b5cda4');
        define('DEBUG', TRUE);
        define('MIN_JS', FALSE);
        define('URL', 'http://goldenage/');
        define('FB_APP_ID', '');
        define('TWITTER_USER', 'mrjeopardypants');
        define('TWITTER_PASS', 'telephone2');
        define('OAUTH_KEY', '2lC2LJVug5fxe7teDCiNg');
        define("OAUTH_SECRET", "GpJjSrb7QkhYV27tf0K21uVmAdIxIH1K94zDyPjKUY");
        define('OAUTH_TOKEN', '174715005-IfkxnLrLtNCoDuKM3GFXy6ePEitfehFfELF493cD');
        define('OAUTH_TOKEN_SECRET', 'ZQc3EpOamcoNULWVdUDZ02BHdZLJ2TAmdCJIHeR3E');
        define('FACEBOOK_APP_ID', '335461103134397');
		define('USE_BITLY', FALSE);
        define('FACEBOOK_SECRET', '66ea3d5b748205921d0f000c30bdca17');
        define('BITLY_KEY', 'R_959e115040ad6ebd8b0184a3c2e64735');
        define('BITLY_LOGIN', 'tylersavery');
		
		define('STATIC_CATEGORY_ID', 11);
        
        break;
}
// define ROOT directories

//private
define('PRIVATE_ROOT', DOCUMENT_ROOT.'private'.DS);
define('PUBLIC_ROOT', DOCUMENT_ROOT.'public'.DS);
define('CORE_ROOT', PRIVATE_ROOT.'core'.DS);
define('CORE_MODEL_ROOT', CORE_ROOT.'models'.DS);
define('CORE_CONTROLLER_ROOT', CORE_ROOT.'controllers'.DS);
define('MODEL_ROOT', PRIVATE_ROOT.'models'.DS);
define('VIEW_ROOT', PRIVATE_ROOT.'views'.DS);
define('CONTROLLER_ROOT', PRIVATE_ROOT.'controllers'.DS);
define('STATIC_CONTROLLER_ROOT', CONTROLLER_ROOT.'static'.DS);
define('LIBRARY_ROOT', PRIVATE_ROOT.'libraries'.DS);
define('IMAGE_UPLOAD_ROOT', PUBLIC_ROOT.'images'.DS.'uploads'.DS);

//public
define('IMAGE_ROOT', '/images/');
define('CSS_ROOT', '/css/');
define('JS_ROOT', '/js/');


define('MAX_SIZE', '1000');

?>
