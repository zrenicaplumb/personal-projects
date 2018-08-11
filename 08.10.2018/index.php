<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Home page</title>
	<?php require_once('includes/head.inc.php'); ?>
</head>
<body>
	<header>
		<div class="container">
			<h1>Upload a meeting</h1>
		</div>
		
	</header>
	<main>
		<div class="container">
			<div class="row">
				<form method="post" action="api.php" enctype="multipart/form-data" >
					<input type="text" name="title">
					<input type="text" name="location">
					<input type="file" name="cover_image">
					<input type="hidden" name="method" value="createMeetingImage">
					<a href="" class="btn" type="submit" name="new-meeting-submit">Upload</a>
				</form>
			</div>
		</div>
	</main>
</body>
</html>