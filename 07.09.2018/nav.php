<?php 
		if(!empty($_GET['api_result'])){
			$api_result = $_GET['api_result'];
			echo $api_result['status'];
			echo "<br/>";
		}
	?>
	<a href="index.php"><img src="img/logo.png" id="logo"></a>
	<nav>			
		<ul>
			<li><a href="calc.php">Calculator</a></li>
			<li>
				<a href="store.php">Store</a>
			</li>
		
			
				<?php if (isset($_SESSION['email'])) {
					echo '<li>
					<a href="gallery.php" class="link">Photo Gallery</a>
					</li>';

				} ?>
					
			
			
		
				<?php if (!isset($_SESSION['email'])) {
					echo '<li class="login">
							<a href="login.php" class="login-btn">Log in</a>
						  </li>';
				} 
				elseif (isset($_SESSION['email'])) {
					echo '<li>
					<a class="logout-btn hide" href="index.php?logout=1">Sign out</a>
					</li>';

				}
				?>
			

			
				<?php if (!isset($_SESSION['email'])) {
					echo '<li class="signup">
							<a href="signup.php" class="signup-btn">Sign up</a>
						  </li>';

				} 
				elseif (isset($_SESSION['email'])) {
					echo '<a class="logout-btn hide" href="index.php?logout=1">Sign out</a>';

				}
				?>
				 
			

			

				<?php 
				if (isset($_SESSION['email'])) {
					$email = $_SESSION['email'];
			        $db = new DB();
			        $sql = "SELECT * FROM personal_info WHERE email = '$email' ";
			        $result = $db->query($sql);
					while ($row = mysqli_fetch_array($result)) {
						echo 
							'		
							<img class="profile-img" src=img/'.$row['image'].'>
							';
					}
					echo '<li class="username">'.$_SESSION['email'].'</li>';
				}
				
				// elseif (!isset($_SESSION['email'])) {

				// 	echo '<li class="username"><a class="logout-btn hide" href="index.php">Sign out</a></li>';
					
				// }
				 ?>
				
			
			
				<?php if (isset($_SESSION['email'])) {
					echo '<li class="signout">
							<a class="logout-btn" href="logout.php">Sign out</a>
						  </li>';

				}
				elseif (!isset($_SESSION['email'])) {
					echo '<li><a class="logout-btn hide" href="index.php">Sign out</a></li>';

				}
				 ?>
				 <?php if (isset($_SESSION['email'])) {
					echo '<li>
						<a href="#" class="cart-link">Cart<img src="img/cart.png" class="cart-icon" /></a>
					</li>';

				} ?>
				<?php if (!isset($_SESSION['email'])) {
					echo '<li>
						<a href="#" class="cart-link hide">Cart<img src="img/cart.png" class="cart-icon" /></a>
					</li>';

				} ?>
			
				
		</ul>
		<div class="cart-shadow hide">
							
		</div>	
		<div class="cart-div">
			<h1>Cart</h1>
			<!-- <form id="cart-form" method="post" action="api.php"> -->
				<!-- <input type="hidden" name="method" value="deleteCartItem"/> -->
				<img src="img/close.png" class="close-x">
				<ul>
					<?php 
						$total = 0.00;
						$cartItems = CartItemController::findAll();
						foreach ($cartItems as $cartItem) {
							
							echo $cartItem->render();
							$total += $cartItem->total;
							
						}
						echo "<p class='total-price'>Total: $".number_format((float) $total, 2, '.', '');
						

					 ?>
				</ul>
				<button href="checkout.php" class="checkout-btn" name="cart-delete" type="submit">Checkout</button>
			<!-- </form> -->
		</div>
		<script>
				// $('#cart-form').ajaxSubmit(function(result){
				// 	if(result.status == "success"){
    //                 	alert("New Item Id: "+result.data.id);
    //                 } else {
    //                 	alert(result.message);
    //                 }
				// });
				$('.cart-item-delete').each(function(){console.log($(this));
					var item = $(this);
					item.ajaxSubmit(function(result){
						if(result.status == "success"){
							item.closest("li").slideUp('fast', function() {
								$(this).remove();
							});
	                    	alert("Item deleted: "+result.data.id);
	                    } else {
	                    	alert(result.message);
	                    }
					});
				});
			</script>
	</nav>