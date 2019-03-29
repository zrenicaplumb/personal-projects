<?php
    class Resource
    {
        public function __construct($item){
            $this->coolProperty = 'cool property';
            $this->coolFunction = 'cool function';
            $this->coolerFunction = $this->sayHello();
            $this->db = new Db();
            if(is_array($item)){
                //assume you've passed in a block of properties for this resource
                foreach($item as $property=>$value){
                    $this->{$property} = $value;
                }
            } elseif(is_numeric($item)){
                //assume you've passed in an id, and fetch the data from the db row
                $sql = "SELECT * FROM {$this->table} WHERE {$this->primary_key} = $this->{$this->primary_key}";
                error_log($sql);
                $result = $this->db->query($sql);
                if($result){
                    foreach($result as $property=>$value){
                        $this->{$property} = $value;
                    }
                }
            } else {
                //do nothing
            }
        }
        public function sayHello(){
            return 'hello';
        }
        public function uploadFile($file){
            // error_object($file);
            $root = '/img';
            $fileInfo = PATHINFO($file);
            // error_object($fileInfo);
            $newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
            // error_object($newFilename);
            error_object($file['image']);
            move_uploaded_file($file["tmp_name"],"img/" . $newFilename);
            $location="img/" . $newFilename;
            
            
           


        }
        public function create(){
            $errors = [];
            if(!empty($this->requiredProperties)){
                foreach($this->requiredProperties as $prop){
                    if(!$this->{$prop}){
                        $errors[] = $prop.' is required';
                    }
                }
            }
            if(!empty($errors)){
                $message = implode(". ", $errors);
                throw new Exception ($message);
            }
            $this->insert();
            return $this;
        }
        public function delete(){
            $id = $this->{$this->primary_key};
            $table = $this->table;
            try {
                return $this->db->delete($table, "{$this->primary_key} = {$id}");
            } catch(Exception $e){
                throw new Exception("Delete Failed: ".$e->getMessage());
            }
        }
        public function update($settings){
            unset($settings[$this->primary_key]);
            foreach($settings as $property=>$value){
                $this->{$property} = $value;
            }
            try {
                $where = $this->primary_key.' = '.$this->{$this->primary_key};
                return $this->db->update($this->table, $this->model(), $where);
            } catch(Exception $e){
                throw new Exception("Update Failed: ".$e->getMessage());
            }
        }
        public function insert(){
            $tableData = $this->model();
            $this->db->insert($this->table, $tableData);
            $this->{$this->primary_key} = $this->db->db->insert_id;
            return $this;
        }
        public function getColumns(){
            $columns = [];
            $result = $this->db->query("DESCRIBE ".$this->table)->fetch_all();
            foreach($result as $column){
                $columns[] = $column[0];
            }
            $this->columns = $columns;
            return $this;
        }
        public function model(){
            $data = [];
            $this->getColumns();
            foreach($this->columns as $column){
                if(property_exists($this, $column)){
                    $data[$column] = $this->{$column};
                } else {
                    $data[$column] = null;
                }
            }
            return $data;
        }
        public function generateResponse($status, $message){
            return $status . ' ' . $message;
      }
    }