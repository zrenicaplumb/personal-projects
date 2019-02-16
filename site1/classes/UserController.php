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
           
      }