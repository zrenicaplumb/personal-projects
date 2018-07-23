<?php
	class DetailsController extends ResourceController{
		static function showDetails(){
			$id = $_GET['id'];
			$db = new DB();
			$sql= "SELECT * FROM music WHERE id='$id'
						UNION 
					SELECT * FROM movies WHERE id='$id'
						UNION 
					SELECT * FROM books WHERE id='$id'
					";
			
			$result = $db->query($sql);
			while ($row = mysqli_fetch_array($result)) {
				
				echo "<img id='details-img' src='img/".$row['image']."'/>";
				
				echo "<h4>Title: ".$row['title']."</h2>";
				echo "<h4>Genre: ".$row['genre']."</h2>";
				echo "<a class='btn btn-primary' href=\"javascript:history.go(-1)\">Back</a>";
				 
				
			}
		}
		
	}