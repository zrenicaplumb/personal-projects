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
			<?php require_once('nav.php');?>
		</header>
		<section class="one">
			<main>
				<div class="container">
					<h1 class="gallery-heading">Gallery</h1>
					<div class="gallery-background d-flex flex-wrap justify-content-center">
						<div class="gallery-shadow hide">
							
							<img src="" class="shadow-img" />
							<div class="text-box">
								<h5>Title: </h5>
							</div>

						</div>
							<?php 
								$galleryItems = GalleryController::findAll();
								foreach($galleryItems as $galleryItem){
									$galleryItem->render();
								}
							?>
					</div>
					
					
				</div>

			</main>
			<form method="post" enctype="multipart/form-data" action="api.php" class="gallery-form">
				<h4 class="upload-img">Add an image</h4>
				<input type="hidden" name="method" value="createGalleryItem" />
				<input type="text" name="title" placeholder="Title">
				<label>Upload image</label>
				<input type="file" name="image" required>
				<button class="btn gallery-submit" type="submit" name="gallerySubmit" value="gallerySubmit">Add to gallery</button>
			</form>
			
			<script>
				$('.gallery-form').ajaxSubmit(function(result){
					if(result.status == "success"){
                    	alert("New Item Id: "+result.data.id);
                    } else {
                    	alert(result.message);
                    }
				});
			</script>

		</section>
		
		
		
		
			<footer>
				<?php require_once("footer.php"); ?>
			</footer>
			
		
	</body>
</html>