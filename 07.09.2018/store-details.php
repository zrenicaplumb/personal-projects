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
				<?php  

				 	require_once('nav.php');
				 ?>
		
			</header>
		<section class="one">
			
			
			<main>
				<div class="container"><h1 class="gallery-heading">Product Details</h1>
					<div class="gallery-background">
						
						<?php
							

							StoreController::storeDetails();

							
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
