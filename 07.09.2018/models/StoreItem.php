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
		// public function itemDetailsRender(){
		// 	echo "
		// 		<img id='details-img' src='img/".$row['image']."'/>
		// 		<h4>Name: ".$row['product_name']."</h2>
		// 		<h4>Price: $".$row['price']."</h2>
		// 		<h4>Description: ".$row['description']."</h2>
		// 		<input type='text' class='item-quantity' value='1' name='quantity'>
		// 		<input class='hidden' type='text' value=".$row['price']." name='price'>
		// 		<input class='hidden' type='text' value=".$row['product_name']." name='product_name'>
		// 		<input class='hidden' type='text' value=".$row['description']." name='description'>
		// 		<input class='hidden' type='text' value=".$row['image']." name='image'>
		// 		<input value='addCartItem' name='method' type='hidden'>
		// 		<input type='hidden' value=".$row['id']." name='id'/>
		// 		<button class='btn btn-primary' href='\"'javascript:history.go(-1)\">Back</button>
		// 		<button class='btn btn-success' href='cart.php?id=".$row['id']." type='submit' name='add'>Add to cart</button>



		// 	";
		// }
		
	}

	