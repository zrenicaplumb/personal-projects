
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once('head.php');?>
		<title>Php/Js practice</title>
	</head>

	<body>
		<header>
			<?php require_once('header.php');?>
		</header>
		<section class="one">
			<main>
				<div class="container">
					<h1 class="gallery-heading">Gallery</h1>
					<div class="gallery-background d-flex flex-wrap justify-content-center">

						<?php 
							require_once('db_info.php');
							
								$connection = new mysqli($servername, $username, $dbpassword, $dbname);
								if ($connection->connect_error) {
									die("connection failed: " . $connection->connect_error);
								}
								$title = $_POST['title'];
								$path = 'img/';
								$tmp_name = $_FILES['image']['tmp_name'];
								$ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
								$image = str_replace(' ', '', $title . '.' . $ext);
								$new = move_uploaded_file($tmp_name, $path . $image);
								$upload_query = "INSERT INTO gallery (image, title)
								VALUES ('$image', '$title')";
								$result = mysqli_query($connection, $upload_query);
								$query = "SELECT * FROM gallery";
								$result = mysqli_query($connection, $query);
								// $uploaded_on = date_format($row['uploaded_on'], "m/d/y" );

// 
								while ($row = mysqli_fetch_array($result)) {
									echo "<div class='img-wrap'>";
									echo "<img src=".$path.$row['image'].">";
									echo "<p class='gallery-text'>".$row['title']."</p>";
									echo "</div>";
									
								}
							
						 ?>
					</div>
					
					
				</div>

			</main>
			<form method="post" enctype="multipart/form-data" action="gallery.php" class="gallery-form">
						<h4 class="upload-img">Add an image</h4>
						<input type="text" name="title" placeholder="Title">
						<label>Upload image</label>
						<input type="file" name="image" required>
						<button class="btn gallery-submit" type="submit" name="gallerysubmit" value="gallerysubmit">Add to gallery</button>
					</form>	
		</section>
		
		
		

	</body>
</html>