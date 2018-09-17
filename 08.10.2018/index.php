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
			<h1>Upload an Item</h1>
		</div>
		
	</header>
	<main>
		<div class="container">
			<div class="item-wrap">
				
			</div>
			<div class="row">
				<form method="post" action="api.php" enctype="multipart/form-data" class="store-item-form">
					<input type="text" name="title">
					<input type="file" name="cover_image">
					<input type="hidden" name="method" value="createStoreItem">
					<a href="" class="btn" type="submit" name="itemSubmit">Upload</a>
				</form>
			</div>
		</div>
	</main>
	<script src="js/components/storeItem.js"></script>
	<script>
		$(function()
		{
			var formPage = {
				items: [],
				init:function(){
					$.ajax({
						url:'api.php',
						data: {method: 'createStoreItem'},
						dataType:'json',
						success: function(result){
							if(result.status == 'success'){
								result.data.foreach(function(item){
									formPage.items.push()
								});
							}
						}
					});
					$('.store-item-form').ajaxSubmit(function(result){
						if(result.status == 'success'){
							var storeItem = storeItem.init(result.data);
							formPage.items.push(storeItem);
							alert("New Item Id: "+result.data.id);
		                    } else {
		                    	alert(result.message);
		                    }
						});
					}
				}
			
			formPage.init();
		});
	</script>
	
</body>
</html>