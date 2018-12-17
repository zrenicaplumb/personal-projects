<?php
      class ResourceController{
            public static function create($data){
                  $class = static::$class;
                  $resource = new $class($data);    
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