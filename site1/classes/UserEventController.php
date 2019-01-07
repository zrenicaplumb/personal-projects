<?php
      class UserEventController extends ResourceController{
            public static $table = 'user_event';
            public static $primary_key = 'event_id';
            public static $class = "UserEvent";
            
            static function getUserEvents($data){
                  error_object($data);
                  $class = static::$class;
                  $db = new DB();
                  $data = [];
                  $sql = "SELECT * FROM user_event WHERE user_email = " .$data['user_email'];
                
                  $result = $db->query($sql);
                  
                  while($row = $result->fetch_assoc()){
                        $data[] = new $class($row);
                  }
                  error_log('getUserEvents');
                  return $data;
            }
      }