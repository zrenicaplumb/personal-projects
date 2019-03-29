<?php
      class User extends Resource{
            public $primary_key = "user_id";
            public $table = "user";
            public $class = "User";

            public function deleteUser($data){
                  $email = $_SESSION['email'];
                  $deleted_at = $data['deleted_at'];
                  error_object($this);
                  $result = $this->db->query("UPDATE {$this->table} SET 'deleted_at' = $deleted_at WHERE email = $email ");
                  if($result){
                        return $result;
                  }
                  else{
                        return $this->generateResponse('failed', 'User not deleted.');

                  }

            }
            public function login($data){
                  error_object($data);
                  $email = $data['email'];
                  $sql = "SELECT * FROM {$this->table} WHERE 'email' = '$email' ";
                  $row = $this->db->query($sql);
                  error_object($row);
                  if($row){
                        if($row['deleted_at'] == null){
                              return $this->generateResponse('active', 'User account is active');
                        }
                  }else{
                        return $this->generateResponse('deleted', 'User account is inactive');

                  }
            }

      }