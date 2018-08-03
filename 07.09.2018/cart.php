<?php 
require_once('config.php');
if (isset($_POST['add'])) {
	$table = 'cart';
	$quantity = $_POST['quantity'];
	$description = $_POST['description'];
	$product_name = $_POST['product_name'];
	$image = $_POST['image'];
	$price = $_POST['price'];
	$total = $quantity * $price;
	$data = [
		'quantity'=>$quantity,
		'image'=>$image,
		'description'=>$description ,
		'product_name'=>$product_name,
		'total'=>$total,
	];
	$db = new DB();
	$db->insert($table, $data);
	header("Location: store.php");

}
	
?>

