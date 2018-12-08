<?php 


session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);	

function error_object($data){
	error_log(print_r($data, true));
}
