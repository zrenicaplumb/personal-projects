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
			<h1>Quiz</h1>
		</div>
		
	</header>
	<main>
		<div class="container">
			<div class="item-wrap">
				
			</div>
			
		</div>
	</main>
	<script src="js/components/quiz.js"></script>
	<script>
		$(function(){
			var Quiz = {
				init:function(){
					$.ajax({
						
						url:'api.php',
						data:{method:''},
						dataType: 'json',
						success:function(result){
							if(result.status == "success"){
								result.data.forEach(function(quiz){
									
								});
							}
						}
					
					});
				}
			}
			Quiz.init();
		});
	</script>

	
</body>
</html>