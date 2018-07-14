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
							<a href="index.php#signup-form"><button id="signup-btn">Sign up</button></a>
						</li>
						<li>
							<a href="index.php#login-form"><button id="login-btn">Log in</button></a>
						</li>
						<li>
							<li class="username">Welcome <?php session_start(); $_SESSION['firstname'] . " " . $lastname; ?></li>
						</li>
					</ul>
				</nav>