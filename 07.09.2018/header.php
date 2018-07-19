	<?php session_start(); 
	require_once("db_info.php");?>
	<a href="index.php"><img src="img/logo.png" id="logo"></a>
	<nav>			
		<ul>
			<li>
				<?php if (isset($_SESSION['email'])) {
					echo '
					<a href="gallery.php" class="link">Photo Gallery</a>
					';

				} ?>
				
			</li>
			<li>
				<a href="">About</a>
			</li>
			<li>
				<a href="">Contact</a>
			</li>
		
				<?php if (!isset($_SESSION['email'])) {
					echo '<li class="login">
							<a href="login.php" class="login-btn " >Log in</a>
						  </li>';
				} 
				elseif (isset($_SESSION['email'])) {
					echo '
					<a class="logout-btn hide" href="index.php?logout=1">Sign out</a>
					';

				}
				?>
			

			
				<?php if (!isset($_SESSION['email'])) {
					echo '<li class="signup">
							<a href="signup.php" class="signup-btn">Sign up</a>
						  </li>';

				} 
				elseif (isset($_SESSION['email'])) {
					echo '<a class="logout-btn hide" href="index.php?logout=1">Sign out</a>';

				}
				?>
				 
			

			<li class="username"> 

				<?php 
					require_once('db_info.php');
					$email = $_SESSION['email'];
			        $connection = new mysqli($servername, $username, $password, $dbname);
			        $query = "SELECT * FROM personal_info WHERE email = '$email' ";
			        $result = mysqli_query($connection, $query) or die('Query failed.');
					while ($row = mysqli_fetch_array($result)) {
						echo 
							'		
							<img class="profile-img" src=img/'.$row['image'].'>
							';
					}
					if (isset($_SESSION['email'])) {
						echo 'Welcome ' . $_SESSION['email']  . '!';
					}
					elseif (!isset($_SESSION['email'])) {
						echo '<a class="logout-btn hide" href="index.php">Sign out</a>';

					}
				 ?>
				
			</li>
				<?php if (isset($_SESSION['email'])) {
					echo '<li class="signout">
							<a class="logout-btn" href="logout.php">Sign out</a>
						  </li>';

				}
				elseif (!isset($_SESSION['email'])) {
					echo '<a class="logout-btn hide" href="index.php">Sign out</a>';

				}
				 ?>
				
		</ul>
	</nav>