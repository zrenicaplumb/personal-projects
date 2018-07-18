	<?php session_start(); ?>
	<a href="index.php"><img src="img/logo.png" id="logo"></a>
	<nav>			
		<ul>
			<li>
				<a href="">Work</a>
			</li>
			<li>
				<a href="">About</a>
			</li>
			<li>
				<a href="">Contact</a>
			</li>
			
			
			
			
			<li>

				<?php if (!isset($_SESSION['email'])) {
					echo '<a href="login.php" class="login-btn">Log in</a>';
				} 
				elseif (isset($_SESSION['email'])) {
					echo '<a class="logout-btn hide" href="index.php?logout=1">Sign out</a>';

				}
				?>
			</li>

			<li>	
				<?php if (!isset($_SESSION['email'])) {
					echo '<a href="signup.php" class="signup-btn">Sign up</a>';

				} 
				elseif (isset($_SESSION['email'])) {
					echo '<a class="logout-btn hide" href="index.php?logout=1">Sign out</a>';

				}
				?>
				 
			</li>

			<li class="username"> 
				<?php 
				if (isset($_SESSION['email'])) {
					echo 'Welcome ' . $_SESSION['email'] . '!';

				}
				elseif (!isset($_SESSION['email'])) {
					echo '<a class="logout-btn hide" href="index.php">Sign out</a>';

				}
				 ?>
				
			</li>
			<li>
				<?php if (isset($_SESSION['email'])) {
					echo '<a class="logout-btn" href="logout.php">Sign out</a>';

				}
				elseif (!isset($_SESSION['email'])) {
					echo '<a class="logout-btn hide" href="index.php">Sign out</a>';

				}
				 ?>
				

			</li>



			
		</ul>
	</nav>