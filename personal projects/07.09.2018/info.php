<?php 
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$servername = "localhost";
	$username = 'will';
	$password = 'password'; 
	$dbname = "php_practice";


	$connection = new mysqli($servername, $username, $password, $dbname);

	if ($connection->connect_error) {
		die("connection failed: " . $connection->connect_error);
	}

	
	$query = "
	INSERT INTO personal_info (firstname, lastname, email)
	VALUES ('$firstname', '$lastname', '$email') 
	";

	if ($connection->query($query) === true) {
		echo "info submitted";
	}

	else{
		echo "Error submitting info" . $connection->$error;
	}

	$connection->$close;


	?>