<?php
Class DB {
	public function __construct($host="localhost", $username="will", $password="", $db_name="php_practice"){
			$this->db = new mysqli($host, $username, $password, $db_name);
		}
	public function query($sql){
		try {
			$result = $this->db->query($sql);
			return $result;
		} catch(Exception $e){
			echo $e->getMessage();
			exit();
		}
		 
	}
}