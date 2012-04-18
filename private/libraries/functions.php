<?php
class Autoload_Class {
	public function __construct() {
		spl_autoload_register(array($this, 'autoload'));
	}
	public static function get_class_file($class_name) {
		$class_name = strtolower($class_name);
		$class_file = '';
		$needle_class_name = '~'.$class_name;
		if (strpos($needle_class_name, 'core')) {
			if (strpos($needle_class_name, 'model')) {
				$class_file = CORE_MODEL_ROOT.$class_name.'.php';
			} else if (strpos($needle_class_name, 'controller')) {
				$class_file = CORE_CONTROLLER_ROOT.$class_name.'.php';
			}
		} else {
			$class_array = explode('_', $class_name);
			array_pop($class_array); // remove the _model || _controller element
			$class_directory = '';
			foreach ($class_array as $directory) {
				$class_directory .= $directory.DS;
			}
			if (strpos($needle_class_name, 'static')) {
				$class_file = STATIC_CONTROLLER_ROOT.$class_name.'.php';
			} else if (strpos($needle_class_name, 'model')) {
				$class_file = MODEL_ROOT.$class_name.'.php';
			} else if (strpos($needle_class_name, 'controller')) {
				$class_file = CONTROLLER_ROOT.$class_directory.$class_name.'.php';
			}
		}
		return $class_file;
	}
	private function autoload($class_name) {
		$class_file = static::get_class_file($class_name);
		if (!empty($class_file)) {
			include_once($class_file);
		}
	}
}
$autoloader = new Autoload_Class();

function redirect_to($location = NULL) {
	if ($location != NULL) {
		header("Location: {$location}");
		exit;
	}
}

function get_full_url() {
	return 'http://'.ENVIROMENT;
}

function is_email($email) {
    $isValid = true;
    $atIndex = strrpos($email, "@");
    if (is_bool($atIndex) && !$atIndex) {
        $isValid = false;
    } else {
        $domain = substr($email, $atIndex+1);
        $local = substr($email, 0, $atIndex);
        $localLen = strlen($local);
        $domainLen = strlen($domain);
        if ($localLen < 1 || $localLen > 64) {
            // local part length exceeded
            $isValid = false;
        } else if ($domainLen < 1 || $domainLen > 255) {
            // domain part length exceeded
            $isValid = false;
        } else if ($local[0] == '.' || $local[$localLen-1] == '.') {
            // local part starts or ends with '.'
            $isValid = false;
        } else if (preg_match('/\\.\\./', $local)) {
            // local part has two consecutive dots
            $isValid = false;
        } else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)) {
            // character not valid in domain part
            $isValid = false;
        } else if (preg_match('/\\.\\./', $domain)) {
            // domain part has two consecutive dots
            $isValid = false;
        } else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))) {
            // character not valid in local part unless 
            // local part is quoted
            if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))) {
                $isValid = false;
            }
        }
        if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A"))) {
            // domain not found in DNS
            $isValid = false;
        }
    }
    return $isValid;
}

function time_to_friendly_date($time, $format = 'Y-m-d'){
	if($time == 0) { return '-'; }	
	
	return date($format, $time);
}

function format_file_size($bytes) {
	 if(!empty($bytes)) {
		 $s = array('bytes', 'kb', 'MB', 'GB', 'TB', 'PB');
		 $e = floor(log($bytes)/log(1024));
		 $output = sprintf('%.'.($e == 0 ? 0 : 0).'f '.$s[$e], ($bytes/pow(1024, floor($e))));
		 return $output;
	 }
}


function title_to_slug($title){
  
  $slug = str_replace(' ', '-', strtolower($title));
  $slug = str_replace('&amp;', 'and', $slug);

  return $slug;
		
}

function slug_to_title($slug){
	
	$title = str_replace('-', ' ', $slug);
	$title = str_replace('Ñ', ' ', $title);
	$title = str_replace('and', '&amp;', $title);
	$title = ucwords($title);
	
	return $title;
}


function word_trim($string, $count, $ellipsis = true){
  $words = explode(' ', $string);
  if (count($words) > $count){
    array_splice($words, $count);
    $string = implode(' ', $words);
    if (is_string($ellipsis)){
      $string .= $ellipsis;
    }
    elseif ($ellipsis){
      $string .= '&hellip;';
    }
  }
  return $string;
}

function char_trim($string, $count, $ellipsis = true){

	$size = strlen($string);
	if ($size > $count){
	
	$string = substr($string, 0, $count);

    if (is_string($ellipsis)){
      $string .= $ellipsis;
    }
    elseif ($ellipsis){
      $string .= '&hellip;';
    }
	
	
  }
  return $string;
}

function remove_special_characters($text){
	
	$entities = array(128 => 'euro', 130 => 'sbquo', 131 => 'fnof',
					  132 => 'bdquo', 133 => 'hellip', 134 => 'dagger',
					  135 => 'Dagger', 136 => 'circ', 137 => 'permil',
					  138 => 'Scaron', 139 => 'lsaquo', 140 => 'OElig',
					  145 => 'lsquo', 146 => 'rsquo', 147 => 'ldquo',
					  148 => 'rdquo', 149 => 'bull', 150 => '#45',
					  151 => 'mdash', 152 => 'tilde', 153 => 'trade',
					  154 => 'scaron', 155 => 'rsaquo', 156 => 'oelig',
					  159 => 'Yuml', 160 => 'nbsp', 240 => 'nbsp',
					  194 => 'nbsp');
	
	$new_text = '';
	
	for($i = 0; $i < strlen($text); $i++) {
		$num = ord($text{$i});
		if (array_key_exists($num, $entities)) {
			switch ($num) {
				case 150:
				$new_text .= '-';
				break;
			default:
				$new_text .= '&'.$entities[$num].';';
			}
		} else if($num < 127 || $num > 159) {
			$new_text .= $text{$i};
		}
	}
	
	//Your nasty string of word and non ascii chars
	$Contentz = $new_text;
	
	//Specific string replaces for ellipsis, etc that you dont want removed but replaced
	$theBad = 	array("Ò","Ó","Ô","Õ","É","Ñ","Ð");
	$theGood = array("\"","\"","'","'","...","-","-");
	$Contentz = str_replace($theBad,$theGood,$Contentz);
	
	//Whatever might be left over...
	//Remove all non ascii chars (aka: bad Microsoft Word and Word Perfect Shit shit)
	$Contentz = preg_replace('/[^(\x20-\x7F)\x0A]*/','', $Contentz);
	
	$Contentz = str_replace('Ñ', '-', $Contentz);
	
	$new_text = $Contentz;
	
	return $new_text;

	}
	
	
	function debug($data){
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
	
	 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }

?>