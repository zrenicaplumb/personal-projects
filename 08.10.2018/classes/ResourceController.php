<?php
    class ResourceController
    {
        static function create($data, $files){
            $class = static::$class;
            
            $resource = new $class($data);
            error_object($class);
            if(!empty($files)){
                $file_name = $resource->uploadFile($files['image']);
    
            }
            $resource->image = $file_name;
            return $resource->create();
        }

    }