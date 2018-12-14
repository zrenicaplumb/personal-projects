<?php
      class UserController extends ResourceController{
            public static $table = 'user';
            public static $primary_key = 'user_id';
            public static $class = "User";
            
            public static function create($data){
                  $class = static::$class;
                  $resource = new $class($data);    
                  error_log('yo');
                  return $resource->create();
            }
      }