<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<?php  require_once('head.php');?>
	<title>Thank you for signing up</title>
</head>
<body>
	<header>
		<?php  require_once('header.php');?>
	</header>
	
	<?php 
	
	//db connection info

	require_once('db_info.php');

	//info submit 

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	//music submit

	$genre = $_POST['genre'];
	$artist = $_POST['artist'];
	$title = preg_replace('/\s+/', '', $_POST['title']);
	// $album_art = $_POST['album_art'];

	//book submit

	$author = $_POST['author'];
	// $cover_art = $_POST['cover_art'];

	//movie submit
	$director = $_POST['director'];
	// $movie_art = $_POST['movie_art'];

	//setting and uploading image file
	$path = 'img/';
	$tmp_name = $_FILES['image']['tmp_name'];
	$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
	$image = $title . '.' . $ext;
	$new = move_uploaded_file($tmp_name, $path.$image);

	//user login
	
	$_SESSION['message'] = '';

	
	

	$connection = new mysqli($servername, $username, $password, $dbname);
	if ($connection->connect_error) {
		die("connection failed: " . $connection->connect_error);
	}
	if (isset($_POST['submit'])) {
		if ($_POST['submit'] == 'signupsubmit') {
			if ($_POST['password'] == $_POST['confirmpassword']) {
				$_SESSION['firstname'] = $firstname;
				$_SESSION['lastname'] = $lastname;
				$_SESSION['image'] = $image;
				$query =" 
					INSERT INTO personal_info (firstname, lastname, email, password, image)
					VALUES ('$firstname', '$lastname', '$email', '$password','$image') 
					";
					if ($connection->$query($query) === true) {
						$_SESSION['message'] = 'Registration successful. Added ' . $firstname. ' ' . $lastname;
					}
			}
			

	}
	elseif ($_POST['submit'] == 'loginsubmit') {
		$query ="SELECT * FROM personal_info";
		
			

	}
	elseif ($_POST['submit'] == 'musicsubmit') {
		
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


	}

	if ($connection->query($query) === true) {
		// echo "info submitted";
	}
	else{
		echo "Error submitting info" . $connection->$error;
	}
	$connection->$close;




	?>
</body>
</html>
