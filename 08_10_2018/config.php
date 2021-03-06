<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);	
require_once('models/DB.php');
require_once('models/Resource.php');
require_once('models/StoreItem.php');
require_once('models/OverlayBox.php');
require_once('classes/API.php');
require_once('classes/ResourceController.php');
require_once('classes/StoreItemController.php');
require_once('classes/OverlayBoxController.php');

function error_object($data){
	error_log(print_r($data, true));
}