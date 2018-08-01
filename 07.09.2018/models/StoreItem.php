<?php  
	class StoreItem extends Resource{
		public $primary_key = "id";
		public $table = "products";
		public $class = "StoreItem";
		public function render(){

			$path = 'img/';
			
			// echo "<div class='store-img' style='background-url(\"../$path$this->image\")'></div>
			// 		<p class='gallery-text'>".$this->name."</p>
			// 		<p class='gallery-text'>Price: $".$this->price."</p>
			//  		<p class='gallery-text'>Description: ".$this->description."</p>";
			 echo "
				 <div class='store-img-wrap'>
				 <a href='store-details.php?id=".$this->id."'>
						<img src=".$path.$this->image." id=".$this->id." value=".$this->id." class='store-img' >
						</a>
						<p class='gallery-text'>Name: ".$this->product_name."</p>
						<p class='gallery-text'>Price: $".$this->price."</p>
						<p class='gallery-text'>Description: ".$this->description."</p>
						
						
						<button class='delete-btn'>Delete</button>
					</div>
					
				";		
			
			
		}
		// public function renderItemDetails(){
		// 	// echo "<img id='details-img' src='img/".$row['image']."'/>";
				
		// 	// echo "<h4>Name: ".$this->name."</h2>";
		// 	// echo "<h4>Genre: ".$this->."</h2>";
		// 	// echo "<a class='btn btn-primary' href=\"javascript:history.go(-1)\">Back</a>";
		// 	// echo "<a class='btn btn-success' href=\"store-details.php\">Add to cart</a>";
		// 	echo "
		// 		 <div class='store-img-wrap'>
		// 		 <a href='store-details.php?id=".$this->id."'>
		// 				<img src=".$path.$this->image." id=".$this->id." value=".$this->id." class='store-img' >
		// 				<p class='gallery-text'>Name: ".$this->name."</p>
		// 				<p class='gallery-text'>Price: $".$this->price."</p>
		// 				<p class='gallery-text'>Description: ".$this->description."</p>
						
		// 				</a>
		// 				<button class='delete-btn'>Delete</button>
		// 			</div>
					
		// 		";	
		// }
	}

	