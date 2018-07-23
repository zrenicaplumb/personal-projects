<?php

Class SearchController extends ResourceController{
	public static $table = "music";

	// public function render(){

	// 	return '<img class="search-img" src="img/'.$row['image'].'"/>';

	// 			'<h5>Title: '.$row['title'].'</h5>';
	// }
	 public static function search(){
		
		
		$search = $_POST['search'];
		$db = new DB();
		$sql = "SELECT * FROM music WHERE title LIKE '%$search%'
			UNION 
		SELECT * FROM books WHERE title LIKE '%$search%'
			UNION
		SELECT * FROM movies WHERE title LIKE '%$search%'
		";
		$result = $db->query($sql);
		while ($row = mysqli_fetch_array($result)) {
			echo '<a href="details.php?id='.$row['id'].'">';
			echo '<img class="search-img" src="img/'.$row['image'].'"/>';
			echo '<a/>';
			echo '<h5>Title: '.$row['title'].'</h5>';
		}
	}
	
}
