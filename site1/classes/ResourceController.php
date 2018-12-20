<?php
      class ResourceController{

            static function create($data, $files){
                  $class = static::$class;
                  $resource = new $class($data);
                  // error_object($class);
                  if(!empty($files)){
                        $file_name = $resource->uploadFile($files['image']);
                        
                  }
                  $resource->image = $file_name;
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
      }