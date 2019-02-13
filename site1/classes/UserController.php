<?php
      class UserController extends ResourceController{
            public static $primary_key = "user_id";
            public static $table = "user";
            public static $class = "User";

           public static function addFriend($data){
                  $db = new DB();
                  $result = $db->singleUpdate(static::$table, $data['email'], $_SESSION['email']);
                  error_object($result);
           }
           
      }