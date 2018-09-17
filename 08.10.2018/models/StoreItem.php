<?php
    class StoreItem extends Resource{
        public $primary_key = "id";
        public $table = "store_items";
        public $class = "StoreItem";
        public $requiredProperties = ['title', 'image'];
    }