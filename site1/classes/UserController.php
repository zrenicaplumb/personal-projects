<?php
      class UserController extends ResourceController{
            public static $primary_key = "user_id";
            public static $table = "user";
            public static $class = "User";

            public static function setUserCredentials($data){
                  $_SESSION['email'] = $data['email'];
                  $_SESSION['password'] = $data['password'];
                  $_SESSION['username'] = $data['username'];
            }
            public static function login($data){
                  $user = new User($data);
                  $result = $user->login($data);
                  if($result){
                        self::setUserCredentials($data);
                  }
                  else{
                        throw new Exception("User doesn't exist.");
                  }
                  return $result;
                  
                  
                  
                  
                  // $table = static::$table;
                  // $email = $data['email'];
                  // $password = $data['password'];
                  // $db = new DB();
                  // $result = $db->query("SELECT * FROM $table WHERE email = '$email' AND password='$password' ");
                  // if($result){
                  //       $data = $result->fetch_assoc();
                  //       error_object($result);

                  //       self::setUserCredentials($data);
                  //       return $data;
                  // }
                  // else{
                  //       throw new Exception("User doesn't exist.");
                  // }
            }
            public static function userSignup($data){
                  $result = parent::create($data);
                  if($result){
                        self::setUserCredentials($data);
                  }
                  else{
                        throw new Exception("User already exists.");
                  }
                  return $result;
            }
            public static function deleteUser($data){
                  $user = new User($data);
                  $result = $user->deleteUser($data);
                  if($result){
                        return $result;
                  }
                  else{
                        return $this->generateResponse('fail', 'User not deleted.');
                  }
                  
            }
      }