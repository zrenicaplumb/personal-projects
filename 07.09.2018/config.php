<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);	
require_once('models/DB.php');
require_once('models/Resource.php');
require_once('models/Book.php');
require_once('models/Movie.php');
require_once('models/Music.php');
require_once('models/Calculator.php');
require_once('models/GalleryItem.php');
require_once('models/StoreItem.php');
require_once('models/CartItem.php');
require_once('classes/ResourceController.php');
require_once('classes/StoreItemController.php');
require_once('classes/CartItemController.php');
require_once('classes/BookController.php');
require_once('classes/MovieController.php');
require_once('classes/MusicController.php');
require_once('classes/GalleryController.php');
require_once('classes/SearchController.php');
require_once('classes/DetailsController.php');
require_once('classes/NavController.php');
function error_object($data){
	error_log(print_r($data, true));
}
