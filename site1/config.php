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
