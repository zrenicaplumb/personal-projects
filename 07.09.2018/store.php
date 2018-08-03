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
				<div class="container">
					<h1 class="gallery-heading">Store</h1>
					<div class="gallery-background d-flex flex-wrap" >
						
						<?php 

						
							$storeItems = StoreItemController::findAll();
								foreach($storeItems as $storeItem){
									$storeItem->render();
								}
						?>
					</div>
				</div>
			</main>

			<form enctype="multipart/form-data" method="post" action="api.php" id="store-upload">
				<h1 class="gallery-heading">Upload item to store</h1>
				<input type="hidden" name="method" value="createStoreItem" />
				<input type="text" name="name" placeholder="Item name" required>
				<input type="number" name="price" placeholder="Price" required>
				<input type="file" name="image" placeholder="Image" required>
				<textarea type="text" name="description" placeholder="Description" required></textarea>
				<button href="store.php" name="submit" value="submit">Upload item</button>
			</form>
		</section>
		
		
			<footer>
				<?php require_once("footer.php"); ?>
			</footer>
			<script type="text/javascript">
				$('#store-upload').submit(function(){
				
					$.ajax({
							url: "api.php",
							method: "POST",
							data: {
								method: "createStoreItem",
							},
							success:function(result){
								console.log(result);
								if(result.status == "success"){
									alert('success');
								} 
							},
							dataType: 'json',
						});
						
					
				});
			</script>
		
		
	</body>
</html>
