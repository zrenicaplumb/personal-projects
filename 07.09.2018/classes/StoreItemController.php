<?php  
	class StoreItemController extends ResourceController{
		public static $table = "products";
		public static $primary_key = "id";
		public static $class = "StoreItem";
		static function storeDetails(){
			$id = $_GET['id'];
			$db = new DB();
			$sql= "SELECT * FROM products WHERE id='$id'";
			$result = $db->query($sql);
			while ($row = mysqli_fetch_array($result)) {
				echo "<form class='purchase-form' action='api.php' method='post'> ";
					echo "<img id='details-img' src='img/".$row['image']."'/>";
					echo "<h4>Name: ".$row['product_name']."</h2>";
					echo "<h4>Price: $".$row['price']."</h2>";
					echo "<h4>Description: ".$row['description']."</h2>";
					echo "<input type='text' class='item-quantity' value='1' name='quantity'>";
					echo "<input class='hidden' type='text' value=".$row['price']." name='price'>";
					echo "<input class='hidden' type='text' value=".$row['product_name']." name='product_name'>";
					echo "<input class='hidden' type='text' value=".$row['description']." name='description'>";
					echo "<input class='hidden' type='text' value=".$row['image']." name='image'>";
					
					echo '<input value="addCartItem" name="method" type="hidden"/>';
					echo '<input type="hidden" value='.$row['id'].' name="id"/>';
					echo "<button class='btn btn-primary' href='\"'javascript:history.go(-1)\">Back</button>";
					echo "<button class='btn btn-success' href='cart.php?id=".$row['id']." type='submit' name='add'>Add to cart</button>";
				echo "</form>";
				// <form action="api.php" method="post" class="cart-item-delete">
				// 			<input value="deleteCartItem" name="method" type="hidden"/>
				// 			<input type="hidden" value='.$this->id.' name="id"/>
				// 			<button type="submit" class="delete-btn">X</button>
				// 		</form>
				
				
			}
			
		}
		// static function storeItemDetailsRender(){
		// 	return '
					

		// 				<a href="details.php?id='.$this->id.'">
		// 					<img class="cart-img" src=img/'.$this->image.' id='.$this->id.' value='.$this->id.' class="gal-img">
		// 				</a>
		// 				<p class="item-text"><strong>'.$this->quantity.'x:</strong> '.$this->product_name.'</p>
		// 				<p class="item-text">Total: $'.$this->total.'</p>
		// 				<p class="item-text">Description: '.$this->description.'</p>
		// 				<form action="api.php" method="post" class="purchase-form">
		// 					<input value="deleteCartItem" name="method" type="hidden"/>
		// 					<input type="hidden" value='.$this->id.' name="id"/>
		// 					<button type="submit" class="delete-btn">X</button>
		// 				</form>
					
					
		// 		';
		// }
		
		
	}