<?php
	/**
	 * 
	 */
	class CartItem extends Resource
	{
		public $table = "cart";
		public $class = "CartItem";
		public $primary_key = "id";

		public function render(){
			return '
					<li>
						<a href="details.php?id='.$this->id.'">
							<img class=" cart-img" src=img/'.$this->image.'>
						</a>
						<p class="item-text"><strong>'.$this->quantity.'x:</strong> '.$this->product_name.'</p>
						<p class="item-text">Total: $'.$this->total.'</p>
						<p class="item-text">Description: '.$this->description.'</p>
						<button class="cart-item-delete" href="delete.php?id='.$this->id.'">X</button>
					</li>
					
				';
		}
		
	}