<?php
      class FriendController extends ResourceController{
            public static $primary_key = "id";
            public static $table = "friend";
            public static $class = "Friend";

            public static function addFriend($data){
                $table = static::$table;
                $db = new DB();
                $result = $db->insert($table, $data);
                return $result;
          }
          public static function getFriendRequests(){
                $db = new DB();
                $column = 'request_sender_email';
                $where = 'requested_friend_email';
                $userEmail = $_SESSION['email'];
                $result = $db->selectWhere($column, static::$table, $where, $userEmail);
                if($result){
                   $data = $result->fetch_assoc(); 
                   error_object($data);
                }
                else{
                    $data = 'No friend requests';
                }
                return $data;
        }

            
      }