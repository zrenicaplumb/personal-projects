<?php
      class UserController extends ResourceController{
            public static $primary_key = "user_id";
            public static $table = "user";
            public static $class = "User";

            static function login($email, $password){

                  $db = new DB();
                  $result = $db->query("SELECT * FROM user WHERE email='$email' AND password='$password' ");
                  
                  $data = $result->fetch_assoc();
                  error_object($data);
                  return $data;
            }
           
      }