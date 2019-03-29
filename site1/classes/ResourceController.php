<?php
      class ResourceController{

            static function create($data){
                  $class = static::$class;
                  $resource = new $class($data);
                  // if($data['image']){
                  //       $resource->image = $resource->uploadFile($data['image']);
                  // }
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
                  return $data;
            }
            static function findById($id){
                  $class = static::$class;
                  $table = static::$table;
                  $primary_key = static::$primary_key;
                  $db = new DB();
                  $result = $db->query("SELECT * FROM {$table} WHERE {$primary_key} = {$id}");
                  $data = $result->fetch_assoc();
                  if($data){
                        $class = static::$class;
                        $object = new $class($data);
                        return $object;
                  } else {
                        return null;
                  }
            }
            static function delete(){
                  $userEmail = $_SESSION['email'];
                  $resource = self::findByEmail($userEmail);
                  $resource->delete();
                  return $resource;
            }
            static function findByEmail($email){
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