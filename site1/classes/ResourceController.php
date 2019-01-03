<?php
      class ResourceController{

            static function create($data, $files=null
            ){
                  $class = static::$class;
                  $resource = new $class($data);
                  // error_object($class);
                  // if(!empty($files)){
                  //       $file_name = $resource->uploadFile($files['image']);
                        
                  // }
                  // $resource->image = $file_name;
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
            static function getPublicEvents(){
                  $class = static::$class;
                  $db = new DB();
                  $data = [];
                  $sql = "SELECT * FROM {static::$table} WHERE event_type = 'public'";
                
                  $result = $db->query($sql);
                  
                  while($row = $result->fetch_assoc()){
                        $data[] = new $class($row);
                  }
                  error_log('findall');
                  return $data;
            }
            static function delete($id){
                  $resource = self::findById($id);
                  $resource->delete();
                  return $resource;
            }
            // static function login($email, $password){
            //       $table = static::$table;
            //       $db = new DB();
            //       $result = $db->query("SELECT * FROM {static::$table} WHERE {static::$email} = {$email} AND {static::$password} = {$password}");
            //       $data = $result->fetch_assoc();
            //       if($data){
            //             $class = static::$class;
            //             return new $class($data);
            //       } else {
            //             return null;
            //       }
            // }
      }