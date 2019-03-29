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

      }