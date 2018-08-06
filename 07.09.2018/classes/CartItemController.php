<?php
	/**
	 * 
	 */
	class CartItemController extends StoreItemController
	{
		public static $table = "cart_item";
		public static $class = "CartItem";
		public static $primary_key = "id";
	

	public static function addCartItem($data){
		$store_item_id = $data['id'];
		$storeItem = static::getStoreItem($store_item_id);

		/*

		*/

		$cart_item = parent::create($data);
		$cart_item->insert();
	}
	public static function getStoreItem($store_item_id){
		if(!$store_item_id){
			return null;
		} else {
			return StoreItemController::findById($store_item_id);
		}
	}
}
