<?php 
	require_once('config.php');
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once('head.php') ?>
	<title>Signup</title>
</head>
<body>
	<header>
		<?php  
		 	require_once('nav.php');
		 ?>
	</header>
	<section class="one">
	
	<main>
		<div class="container">
			</div>
			<form method="post" enctype="multipart/form-data" action="signup.php" id="signup-form">
				<h4 class="footer-form" >Sign up</h4>
				<input type="email" name="email" placeholder="Email" required>
				<input type="password" name="password" placeholder="Password" required>
				<input type="password" name="confirmpassword" placeholder="Confirm password" required>
				<input type="file" name="image" placeholder="Profile Image" >
				<button class="btn info-btn" type="submit" name="submit" value="signupsubmit">Sign up</button>
			</form>
		</div>
	</main>
	</section>
	<?php 
	require_once('db_info.php');
	$connection = new mysqli($servername, $username, $dbpassword, $dbname);
	if ($connection->connect_error) {
		die("connection failed: " . $connection->connect_error);
	}
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$path = 'img/';
		$tmp_name = $_FILES['image']['tmp_name'];
		$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
		if (isset($_POST['submit'])) {
			if ($_POST['password'] == $_POST['confirmpassword']) {
				$image = str_replace(' ', '', $email . '.' . $ext);
				$new = move_uploaded_file($tmp_name, $path . $image);
				$query_email = "SELECT * FROM personal_info WHERE email = '$email' ";
				$email_res = mysqli_query($connection, $query_email);
				if (mysqli_num_rows($email_res) > 0) {
					$email_error;
				}
				else{
					$query = "
						INSERT INTO personal_info (email, password, image)
						VALUES ('$email', '$password', '$image')
					";
					$_SESSION['email'] = $_POST['email'];

					echo "
					
					<script>window.location = 'index.php';</script>
					";
				}
			}
			else{
				echo "<script> alert('Passwords do not match')</script>";
			}	
		}
	}
	if ($connection->query($query) === true) {
		echo "info submitted";
	}
	else{
		echo "Error submitting info" . $connection->$error;
	}
	$connection->$close; ?>
</body>

</html>
