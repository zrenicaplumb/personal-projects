<?php
	/**
	 * 
	 */
	class CartItem extends Resource
	{
		public $table = "cart_item";
		public $class = "CartItem";
		public $primary_key = "id";


		public function render(){
			return '
					<li>
						<a href="details.php?id='.$this->id.'">
							<img class="cart-img" src=img/'.$this->image.' id='.$this->id.' value='.$this->id.' class="gal-img">
						</a>
						<p class="item-text"><strong>'.$this->quantity.'x:</strong> '.$this->product_name.'</p>
						<p class="item-text">Total: $'.$this->total.'</p>
						<p class="item-text">Description: '.$this->description.'</p>
						<form action="api.php" method="post" class="cart-item-delete">
							<input value="deleteCartItem" name="method" type="hidden"/>
							<input type="hidden" value='.$this->id.' name="id"/>
							<button type="submit" class="delete-btn">X</button>
						</form>
					</li>
					
				';
		}
		
	}