<?php 
    class StoreItemController extends ResourceController{
        public static $table = 'store_items';
        public static $primary_key = 'id';
        public static $class = "StoreItem";
        public static $requiredProperties = ['title', 'image'];
        
    }