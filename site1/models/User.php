      <?php
      class User extends Resource{
            public $primary_key = "user_id";
            public $table = "user";
            public $class = "User";

            public function userLogin(){
                  error_object($this);
            }
            
           
      }