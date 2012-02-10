<?php

// define ENVIROMENT
define('ENVIROMENT', $_SERVER['SERVER_NAME']);

// define DS
define('DS', DIRECTORY_SEPARATOR);

// define DOCUMENT_ROOT
switch(ENVIROMENT) {

    case 'goldenage.dev':
        define('DOCUMENT_ROOT', DS.'Users'.DS.'admin'.DS.'Sites'.DS.'goldenage'.DS);
        break;
    
}

// include includes.php
require_once(DOCUMENT_ROOT.'private'.DS.'includes.php');

// spread wings
$pigeon = new Pigeon();
echo $pigeon->fly();

?>
