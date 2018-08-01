<?php require_once('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once('head.php') ?>
	<title>Login</title>
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
			
			<form method="post" enctype="multipart/form-data" action="login2.php" id="login-form">
				<h4 class="footer-form">Login</h4>
				<input type="email" name="email" placeholder="Email" required>
				<input type="password" name="password" placeholder="Password" required>
				<button class="btn info-btn" type="submit" name="submit" value="submit">Log in</button>
			</form>
		</div>
	</main>
	</section>
	<footer>
				<?php require_once("footer.php"); ?>
			</footer>
</body>

</html>