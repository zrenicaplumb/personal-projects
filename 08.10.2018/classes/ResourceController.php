<?php
    class ResourceController
    {
        public static function create($data, $files){
            $class = static::$class;
            $resource = new $class($data);
            if(!empty($files)){
                $file_name = $resource->uploadFile($files['image']);
    
            }
            $resource->image = $file_name;
            return $resource->create();
        }
    }