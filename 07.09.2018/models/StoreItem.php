<?php  
	class StoreItem extends Resource{
		public $primary_key = "id";
		public $table = "products";
		public $class = "StoreItem";
		public function render(){

			$path = 'img/';
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
		
	}

	