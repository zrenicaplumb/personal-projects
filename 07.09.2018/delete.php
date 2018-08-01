<?php 
require_once('config.php');
	session_start();
	require_once('db_info.php');

	if ($_POST['action'] == "delete"){

		$id = $_POST['id'];
		$db = new mysqli($servername, $username, $dbpassword, $dbname);
		$query = "DELETE FROM gallery WHERE id='$id' ";
		$query2 = "DELETE FROM products WHERE id='$id'";
		$result = mysqli_query($db, $query);
		$result = mysqli_query($db, $query2);
	}

		
		
		
	
 ?>