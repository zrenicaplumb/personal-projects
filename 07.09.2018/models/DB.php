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
	public function insert($table, $data){
		$sql = "INSERT INTO $table SET ";
		foreach($data as $column=>$value){
			$sql .= "$column".",";
		}
		$sql .= "VALUES ";
		foreach($data as $column=>$value){
			$sql .= "$value".",";
		}
		$this->db->query($sql);
	}
	public function update($table, $data, $where){

	}
	public function delete($table, $where){

	}
	public function select($table, $where){
		
	}
	
}