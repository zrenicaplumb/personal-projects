<?php
// error_log('hello');
// phpinfo();
// exit;
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
		<nav>
			<?php
				require_once('includes/nav.inc.php');
			?>
		</nav>
		<div class="container">
			<h1></h1>
		</div>
		
	</header>
	<main>
		<div class="container">
			<div class="item-wrap">
			
			</div>
			<form method="post"  enctype="multipart/form-data" action="api.php" class="store-item-form">
					<input type="hidden" name="method" value="createStoreItem">
					<input type="text" name="title" placeholder="Title">
					<input type="file" name="image" placeholder="Image" required>
					<input type="text" name="description" placeholder="Description">
					<input type="number" step="0.01" name="price" placeholder="Price">
					
					<button class="btn" type="submit" name="submit">Upload</button>
				</form>
				
				
				
			</div>
			<button class="btn overlayBoxBtn" name="overlayBoxBtn" type="submit" >Overlay Box</button>
		</div>
		<div class="aptivada-widget" data-widget-id="14" data-widget-type="widget" style="background:#ffffff url(https://cdn2.aptivada.com/images/iframeLoader.gif) no-repeat center; min-height:500px;"></div>	
		
	
	
	
	
	
	
	
	</main>
	<script src="js/components/overlayBox.js"></script>
	<script src="js/components/storeItem.js"></script>
	<script>
		$(function()
		{
			var Page = {
				storeItemsArray: [],
				overlayBoxArray: [],
				init:function(){

					$.ajax({
						url:'api.php',
						data:{method:'getStoreItems'},
						dataType:'json',
						success:function(result){
							if(result.status == 'success'){
								result.data.forEach(function(storeItem){
									Page.storeItemsArray.push(StoreItem.init(storeItem));
									console.log(storeItem);
								});
							}
							else{
								console.log('Something is wrong. :"(');
							}
						}
					});
					$.ajax({
						url:'api.php',
						data:{method:'getOverlayBoxes'},
						dataType:'json',
						success:function(result){
							if(result.status == 'success'){
								result.data.forEach(function(box){
									Page.overlayBoxArray.push(Box.init(box));
									console.log(box);
								});
							}
							else{
								console.log('Something is wrong. :"(');
							}
						}
					});
					this.listeners();
				},
				listeners:function(){
					
					$('.store-item-form').ajaxSubmit(function(result){
						console.log(result);
						if(result.status == 'success'){
							var newStoreItem = StoreItem.init(result.data);
							Page.storeItemsArray.push(newStoreItem);
							// alert("New Item Id: "+result.data.id);
		                } else {
		                    	alert(result.message);
		                    }
					});

					// $('.overlayBoxForm').ajaxSubmit(function(result){
					// 	console.log(result);
					// 	if(result.status == 'success'){
					// 		var newOverlayBox = Box.init(result.data);
					// 		Page.overlayBoxArray.push(newOverlayBox);
					// 		// alert("New Item Id: "+result.data.id);
		            //     } else {\
		            //         	alert(result.message);
		            //         }
					// });

					$('.overlayBoxBtn').on('click',function(){
						var box = {};
						Box.init(box);
					});
				
				}

			}
			
				Page.init();
		});
	</script>
	
	
</body>
</html>