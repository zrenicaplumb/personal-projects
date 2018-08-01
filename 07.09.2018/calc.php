<?php

require_once('config.php');

?>
<!DOCTYPE html>
<html>
<head>
	<?php require_once('head.php') ?>
	<title>Login</title>
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
			<form method="post" enctype="multipart/form-data" action="api.php" id="calculator">
				<h1 class="footer-form gallery-heading">Calculator</h1>
				<div class="errorMessages" style="color:#c33;"></div>
				<input type="text" name="num1" placeholder="" required>
				<input type="text" name="num2" placeholder="" required>
				<select name="cal">
					<option value="add">Add</option>
					<option value="subtract">Subtract</option>
					<option value="multiply">Multiply</option>
					<option value="divide">Divide</option>
				</select>
				<button class="btn info-btn" type="submit" name="calcsubmit" value="submit">Calculate</button>
				<input type="text" class="result" readonly>
			</form>
		</div>
	</main>
	</section>
	<footer>
		<?php require_once("footer.php"); ?>
	</footer>
	<script>
		$('#calculator').submit(function(e){
			e.preventDefault();
			$('#calculator .errorMessages').empty();
			$('#calculator input').removeClass('warning');
			var num1 = $("#calculator input[name='num1']");
			var num2 = $("#calculator input[name='num2']");
			var num1Val = num1.val();
			var num2Val = num2.val();
			var errors = [];
			if(isNaN(num1Val)){
				errors.push("<strong>Number 1</strong> must be a number");
				num1.addClass('warning');
			}
			if(isNaN(num2Val)){
				errors.push("<strong>Number 2</strong> must be a number");
				num2.addClass('warning');
			}
			if(errors.length){
				var message = errors.join(". <br/>");
				$('#calculator .errorMessages').html(message);
			} else {
				$.ajax({
					url: "api.php",
					method: "POST",
					data: {
						method: "calculate",
						operation: $(this).find('select[name="cal"]').val(),
						num1: num1Val,
						num2: num2Val,
					},
					success:function(result){
						console.log(result);
						if(result.status == "success"){
							$('#calculator').find('.result').val(result.data);
						} else {
							alert(result.message);
						}
					},
					dataType: 'json',
				});
			}
		});
	</script>
</body>

</html>