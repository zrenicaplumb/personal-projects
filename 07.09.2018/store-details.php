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
						

						StoreItemController::storeDetails();
						
							
						 ?>
			
					</div>
				</div>
			</main>
		</section>
		

			<footer>
				<?php require_once("footer.php"); ?>
			</footer>
			<script type="text/javascript">
				$('.purchase-form').ajaxSubmit(function(result){
					if(result.status == "success"){
                    	alert("item added to cart: "+result.data.id);
                    } else {
                    	alert(result.message);
                    }
				});
			</script>
		
		
	</body>
</html>
