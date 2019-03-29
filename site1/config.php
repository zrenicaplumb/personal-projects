<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);	
require_once('models/DB.php');
require_once('models/Resource.php');
require_once('models/EventForm.php');
require_once('models/User.php');
require_once('models/UserEvent.php');
require_once('models/Friend.php');
require_once('classes/API.php');
require_once('classes/ResourceController.php');
require_once('classes/NavController.php');
require_once('classes/UserController.php');
require_once('classes/UserEventController.php');
require_once('classes/FriendController.php');

function error_object($data){
	error_log(print_r($data, true));
}
// function backtrace($int = 1, $max = null){
// 	if(!is_numeric($max)){
// 	    $max = $int + 3;
// 	}
// 	$debug = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, $max);
  
// 	$str = "";
  
// 	for($i = $int; $i < $max; $i++){
// 	    $row = $debug[$i];
// 	    if(isset($row['file'])){
// 		  $str .= (isset($row['function']) ? $row['function'] . '() ' : '') .  $row['file'] . '@' . $row['line'];
// 		  break;
// 	    }
// 	}
  
// 	return $str;
//   }
  
//   $MICROTIME = microtime(1);
//   function bug(){
// 	global $MICROTIME;
  
// 	$xs = func_get_args();
  
// 	$last = array_pop($xs);
// 	$backtrace_index = 1;
// 	$options = [];
  
// 	if(is_array($last) && isset($last['options'])){
// 	    $options = $last['options'];
// 	    if(isset($options['backtrace_index'])){
// 		  $backtrace_index = $options['backtrace_index'];
// 	    }
// 	}else{
// 	    array_push($xs, $last);
// 	}
  
// 	$date = date('Y-m-d H:i:s', time());
// 	$file = backtrace($backtrace_index);
  
// 	$params = implode(',', array_map(function($key){
// 	    return '$p' . $key;
// 	}, array_keys($xs)));
  
// 	logger('bug(%params%){ //%date%, %file% (%time%)', [
// 	    'date' => $date,
// 	    'file' => $file,
// 	    'params' => $params,
// 	    'time' => round( microtime(1) - $MICROTIME, 3) . 'secs',
// 	]);
  
// 	foreach($xs as $int => $x){
// 	    if(is_array($x) || is_object($x)){
// 		  $message = print_r($x, true);
// 		  $lines = explode(PHP_EOL, $message);
// 		  foreach($lines as $key => $val){
// 			if($key < 1){
// 			    continue;
// 			}
// 			$lines[$key] = '    ' . $val;
// 		  }
// 		  $message = implode(PHP_EOL, $lines);
// 	    }else if(is_null($x)){
// 		  $message = 'NULL';
// 	    }else if(is_bool($x)){
// 		  $message = '(bool) ' . ($x ? 'true' : 'false');
// 	    }else{
// 		  $message = '('. gettype($x) .') ' . $x;
// 	    }
// 	    logger("  %int% %message%", [
// 		  "int" => '$p' . $int,
// 		  "message" => $message,
// 	    ]);
// 	}
  
// 	if(isset($options['backtrace'])){
// 	    logger("\n  //backtrace 1 - %backtrace%", [
// 		  'backtrace' => $options['backtrace'],
// 	    ]);
// 	    for($i = 1; $i < $options['backtrace'] + 1; $i++){
// 		  logger("  //%line%", [
// 			'line' => backtrace($i),
// 		  ]);
// 	    }
// 	}
// 	logger('} //end bug' . PHP_EOL);
//   }
  
  
//   function logger($message, $data = [], $logFile = "/var/log/apache2/bug.log"){
// 	foreach($data as $key => $val){
// 	  $message = str_replace("%{$key}%", $val, $message);
// 	}
// 	$message .= PHP_EOL;
  
// 	return @error_log($message, 3, $logFile);
//   }
