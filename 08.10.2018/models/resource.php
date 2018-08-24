<?php
    class Resource
    {
        public function __construct($item)
        {
            $this->db = new DB();
            if(is_array($item)){
                foreach($item as $property=>$value){
                    $this->{$property} = $value;
                }
            }
            else if(is_numeric($item)){
                
            }
        }
        public function uploadFile(){

        }
        public function create(){

        }
    }