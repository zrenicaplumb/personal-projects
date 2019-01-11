<?php
      class UserEventController extends ResourceController{
            public static $table = 'user_event';
            public static $primary_key = 'event_id';
            public static $class = "UserEvent";
            
            static function getUserEvents($userEmail){
                  $class = static::$class;
                  $db = new DB();
                  $data = [];
                  $sql = "SELECT * FROM user_event WHERE user_email = '$userEmail'";
                  $result = $db->query($sql);
                  error_object($result);
                  if(!$result){
                       throw new Exception('That user email does not exist.');
                  }
                  while($row = $result->fetch_assoc()){
                        $data[] = new $class($row);
                  }
                  return $data;
            }

            static function deleteUserEvent($data){
                  $resource = parent::findById($data['event_id']);
                  $resource->delete();
                  return $resource;
                  
            }

            static function getHomepageEvents(){
                  //grab all public events
                  //grab all events made by the user
                  //grab all private events where the user's name is in the invite_list column
                  // select all from user event except private events taht dont match the users email unless their email exists in the invite_list column
                  $email = $_SESSION['email'];
                  $class = static::$class;
                  $db = new DB();
                  $data = [];
                  $sql = "SELECT * 
                        FROM user_event 
                        WHERE event_type = 'public'
                        OR (
                              event_type = 'private'
                              AND invite_list LIKE '%".$email."%'
                        ) 
                        OR (
                              event_type = 'private'
                              AND user_email LIKE '%".$email."%'
                        )";
                  $publicEvents = $db->query($sql);
                  if(!$publicEvents){
                       throw new Exception('That user email does not exist.');
                  }
                  while($row = $publicEvents->fetch_assoc()){
                        $data[] = new $class($row);
                  }
                  return $data;
                  
            }
      }