<?php
      class ResourceController{

            static function create($data){
                  $class = static::$class;
                  $resource = new $class($data);
                  if($data['image']){
                        $file_name = $resource->uploadFile($data['image']);
                        $resource->image = $file_name;
                  }
                  
                  return $resource->create();
            }
            
            static function findAll(){
                  $class = static::$class;
                  $db = new DB();
                  $data = [];
                  $sql = "SELECT * FROM ".static::$table;
                
                  $result = $db->query($sql);
                  
                  while($row = $result->fetch_assoc()){
                        $data[] = new $class($row);
                  }
                  error_log('findall');
                  return $data;
                  
            }

            

            static function findById($id){
                  $class = static::$class;
                  $table = static::$table;
                  // error_object($table);
                  $primary_key = static::$primary_key;
                  $db = new DB();
                  $result = $db->query("SELECT * FROM {$table} WHERE {$primary_key} = {$id}");
                  $data = $result->fetch_assoc();
                  if($data){
                        $class = static::$class;
                        $object = new $class($data);
                        return $object;
                        // errorObject($object);
                  } else {
                        return null;
                  }
            }
            static function getPublicEvents(){
                  $class = static::$class;
                  $db = new DB();
                  $data = [];
                  $sql = "SELECT * FROM user_event WHERE event_type = 'public'";
                
                  $result = $db->query($sql);
                  // error_object($result);
                  while($row = $result->fetch_assoc()){
                        $data[] = new $class($row);
                  }
                  return $data;
            }
            static function login($email, $password){

                  $db = new DB();
                  $result = $db->query("SELECT * FROM user WHERE email='$email' AND password='$password' ");
                  if(!$result){
                        throw new Exception("User doesn't exist");
                  }
                  $data = $result->fetch_assoc();
                  // error_object($data);
                  return $data;
            }
            static function delete($email){
                  

                  $resource = self::findByEmail($email);
                  $resource->delete();
                  return $resource;
            }


            static function findByEmail($email){
                  // error_object($email);
                  $db = new DB();
                  $result = $db->query("SELECT * FROM user WHERE email = '$email'");
                  $data = $result->fetch_assoc();
                  if($data){
                        $class = static::$class;
                        return new $class($data);
                  } else {
                        return null;
                  }
            }
            
           
           
      }