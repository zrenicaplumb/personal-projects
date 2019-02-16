<?php
      class UserEventController extends ResourceController{
            public static $table = 'user_event';
            public static $primary_key = 'event_id';
            public static $class = "UserEvent";
            
            // public static function getPublicEvents(){
            //       $class = static::$class;
            //       $db = new DB();
            //       $data = [];
            //       $sql = "SELECT * FROM user_event WHERE event_type = 'public'";
            //       $result = $db->query($sql);
            //       while($row = $result->fetch_assoc()){
            //             $data[] = new $class($row);
            //       }
            //       return $data;
            // }
            public static function getUserEvents($data){
                  $where = $data['where'];
                  $value = $data['value'];
                  $userEmail = $_SESSION['email'];
                  $class = static::$class;
                  $db = new DB();
                  $data = [];
                  $sql = "SELECT * FROM {static::$table} WHERE $where = $userEmail";
                  $result = $db->query($sql);
                  if(!$result){
                       throw new Exception('That user email does not exist.');
                  }
                  while($row = $result->fetch_assoc()){
                        $data[] = new $class($row);
                  }
                  return $data;
            }
            public static function deleteUserEvent($data){
                  $resource = parent::findById($data['event_id']);
                  $resource->delete();
                  return $resource;
            }
            public static function getHomepageEvents(){
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