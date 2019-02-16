<?php
      class UserController extends ResourceController{
            public static $primary_key = "user_id";
            public static $table = "user";
            public static $class = "User";


            //find the db entry where the email = $data['userEmail'] 
            //grab the value that is already in friends column
            //concatenate it with the friend email
            //insert into friends column
            public static function addFriend($data){
                  $db = new DB();
                  $userEmail = $_SESSION['email'];
                  $friendsEmails = $db->select(static::$table, 'friends', 'email', $userEmail);

                  $newFriendsEmails = $friendsEmails. $data['friend_email'];
                  error_object($newFriendsEmails);

                  $sql = "UPDATE user SET friends = $newFriendsEmails WHERE email = $userEmail";
                  $result = $db->query($sql);
                  // error_object($result);
                  return $result;
            }
            public static function login($email, $password, $username){
                  $db = new DB();
                  $result = $db->query("SELECT * FROM user WHERE email='$email' AND password='$password' ");
                  if(!$result){
                        throw new Exception("User doesn't exist");
                  }
                  else{
                        $data = $result->fetch_assoc();
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;
                        $_SESSION['username'] = $username;
                        error_object($_SESSION['email']);
                        return $data;
                  }
            }
            public static function userSignup($data){
                  $result = parent::create($data);
                  if($result){
                        $_SESSION['email'] = $data['email'];
                        $_SESSION['password'] = $data['password'];
                        $_SESSION['username'] = $data['username'];
                  }
                  return $result;
            }
           
      }