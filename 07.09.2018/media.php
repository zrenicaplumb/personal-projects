<?php
	header("location: index.php");
 	require_once('db_info.php');
 	$dbconn = new mysqli($servername, $username, $dbpassword, $dbname);
	if ($connection->connect_error) {
		die("connection failed: " . $dbconn->connect_error);
	} 
	//music submit
	$genre = $_POST['genre'];
	$artist = $_POST['artist'];
	$title = $_POST['title'];

	//book submit
	$author = $_POST['author'];

	//movie submit
	$director = $_POST['director'];
	
	//setting and uploading image file
	$path = 'img/';
	$tmp_name = $_FILES['image']['tmp_name'];
	$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
	$image = str_replace(' ', '', $title . '.' . $ext);
	$new = move_uploaded_file($tmp_name, $path . $image);


	if ($_POST['submit'] == 'musicsubmit') {
		
		$query =" 
				INSERT INTO music (genre, artist, title, image)
				VALUES ('$genre', '$artist', '$title', '$image') 
				";
	}
	elseif ($_POST['submit'] == 'booksubmit') {

		$query =" 
				INSERT INTO books (genre, author, title, image)
				VALUES ('$genre', '$author', '$title', '$image') 
				";
	}
	elseif ($_POST['submit'] == 'moviesubmit') {
		$query =" 
				INSERT INTO movies (genre, title, director, image)
				VALUES ('$genre', '$title', '$director', '$image') 
				";
	}
	if ($dbconn->query($query) === true) {
		echo "info submitted";
	}
	else{
		echo "Error submitting info" . $dbconn->$error;
	}
	$dbconn->$close;
?>