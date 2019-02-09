<?php
      class UserController extends ResourceController{
            public static $primary_key = "user_id";
            public static $table = "user";
            public static $class = "User";

            
            static function findByEmail($email){
                  $db = new DB();
                  $result = $db->query("SELECT * FROM user WHERE email = '$email'");
                  $data = $result->fetch_assoc();
                  if($data){
                        $class = static::$class;
                        return new $class($data);
                  } else {
                        return null;
                  }
            }
           
      }