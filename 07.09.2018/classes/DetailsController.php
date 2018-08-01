<?php
	class DetailsController extends ResourceController{
		static function showDetails(){
			$id = $_GET['id'];
			$db = new DB();
			$sql= "SELECT * FROM products WHERE id='$id'
						
					";
			$result = $db->query($sql);
			while ($row = mysqli_fetch_array($result)) {
				
				echo "<img id='details-img' src='img/".$row['image']."'/>";
				
				echo "<h4>Title: ".$row['name']."</h2>";
				echo "<h4>Genre: ".$row['price']."</h2>";
				echo "<a class='btn btn-primary' href=\"javascript:history.go(-1)\">Back</a>";
				echo "<a class='btn btn-success' href=\"store-details.php\">Add to cart</a>";
				
				
			}

		}
		
		
	}