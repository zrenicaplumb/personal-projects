<?php 
	require_once('db_info.php');
	session_start();
	if (isset($_POST['submit'])) {
		$connection = new mysqli($servername, $username, $dbpassword, $dbname);
		if ($connection->connect_error) {
			die("connection failed: " . $connection->connect_error);
		}
		$email = $_POST['email'];
		$password = $_POST['password'];
		if(!empty($username) && !empty($password)){
		
			
			$query = "SELECT * FROM personal_info WHERE email = '$email' and password = '$password' ";
			$result = mysqli_query($connection, $query);

			if (mysqli_num_rows($result) == 1) {

				$row = mysqli_fetch_array($result);
				if ($row['email'] == $email && $row['password'] == $password) {
					$_SESSION['email'] = $email;
					
					header("Location: index.php");
				}
				// elseif ($row['email'] != $email) {
				// 	echo "incorrect email";
				// 	header("Location: signup.php");
				// }
				// elseif ($row['password'] != $password) {
				// 	echo "incorrect password";
				// 	header("Location: signup.php");
				// }
				
			}
			else{
				echo "Could not find account for " . $_POST['email'];
			}
		}

	}
		

		
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once('head.php') ?>
	<title>Login</title>
</head>
<body>
	<header>
		<?php  

		 	require_once('header.php');
		 ?>
	</header>
	<section class="one">
		
	
	
	<main>
		<div class="container">
			
			<form method="post" enctype="multipart/form-data" action="login.php" id="login-form">
				<h4 class="footer-form">Login</h4>
				<input type="email" name="email" placeholder="Email" required>
				<input type="password" name="password" placeholder="Password" required>
				<button class="btn info-btn" type="submit" name="submit" value="submit">Log in</button>
			</form>
		</div>
	</main>
	</section>
	
</body>

</html>