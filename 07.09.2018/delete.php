<?php 
require_once('config.php');

	require_once('db_info.php');

	if ($_POST['action'] == "delete"){

		$id = $_POST['id'];
		$db = new mysqli($servername, $username, $dbpassword, $dbname);
		$query = "DELETE FROM gallery WHERE id='$id' ";
		$query2 = "DELETE FROM products WHERE id='$id'";
		$query3 = "DELETE FROM cart WHERE id='$id'";
		$result = mysqli_query($db, $query);
		$result2 = mysqli_query($db, $query2);
		$result3 = mysqli_query($db, $query3);
	}

		
		
		
	
 ?>