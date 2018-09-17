<?php 
    class StoreItemController extends ResourceController{
        static $table = 'store_items';
        static $primary_key = 'id';
        static $class = "StoreItem";
        public $requiredProperties = ['title','image'];
    }