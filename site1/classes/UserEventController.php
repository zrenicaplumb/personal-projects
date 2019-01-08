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
      }