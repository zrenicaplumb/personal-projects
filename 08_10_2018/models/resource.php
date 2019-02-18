<?php
    class Resource
    {
        public function __construct($item){
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
        public function uploadFile($file){
            $path = 'img/';
            if(!$file || !$file['tmp_name']){
                throw new Exception("File is Required");
            }
            $tmp_name = $file['tmp_name'];
            $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
            if(!in_array(strtolower($ext), ['jpg','jpeg','png','gif'])){
                throw new Exception ("Invalid File Format");
            }
            $rand = time();
            $image = str_replace(' ', '_', $rand. '.' . $ext);
            $move = move_uploaded_file($tmp_name, $path . $image);
            if(!$move){
                throw new Exception ("Could not copy file");
            }
            return $image;
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
    }