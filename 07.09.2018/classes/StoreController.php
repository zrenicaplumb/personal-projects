<?php  
	class StoreController extends ResourceController{
		public static $table = "products";
		public static $primary_key = "id";
		public static $class = "StoreItem";
		static function storeDetails(){
			$id = $_GET['id'];
			$db = new DB();
			$sql= "SELECT * FROM products WHERE id='$id'";
			$result = $db->query($sql);
			while ($row = mysqli_fetch_array($result)) {
				echo "<form class='purchase-form' action='cart.php' method='post'> ";
					echo "<img id='details-img' src='img/".$row['image']."'/>";
					echo "<h4>Name: ".$row['product_name']."</h2>";
					echo "<h4>Price: $".$row['price']."</h2>";
					echo "<h4>Description: ".$row['description']."</h2>";
					echo "<input type='text' class='item-quantity' value='1' name='item_quantity'>";
					echo "<input class='hidden' type='text' value=".$row['price']." name='price'>";
					echo "<input class='hidden' type='text' value=".$row['product_name']." name='product_name'>";
					echo "<input class='hidden' type='text' value=".$row['description']." name='description'>";
					echo "<input class='hidden' type='text' value=".$row['image']." name='image'>";

					echo "<button class='btn btn-primary' href=\"javascript:history.go(-1)\">Back</button>";
					echo "<button class='btn btn-success' href='cart.php?id=".$row['id']." type='submit' name='add'>Add to cart</button>";
				echo "</form>";
				
				
			}
			
		}
		
		
	}