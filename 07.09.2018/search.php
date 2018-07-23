<?php
require_once('config.php');
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		
		<?php require_once('head.php');?>
		<title>Php/Js practice</title>
	</head>

	<body>
		<header>
			<div class="container">
				<?php  

				 	require_once('nav.php');
				 ?>
			</div>
				
			</header>
		<section class="one">
			
			
			<main>
				<div class="container">
					<div class="gallery-background">
						<h2>Results</h2>
					
						<?php 
							if (isset($_POST['search_submit'])) {
								SearchController::search();
							}

						?>
					</div>
				</div>
			</main>
		</section>
		
		<section class="four">
			<footer>
				<?php require_once("footer.php"); ?>
			</footer>
			
		</section>
		
	</body>
</html>
