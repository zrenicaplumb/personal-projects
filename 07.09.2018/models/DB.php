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
		$sql = "INSERT INTO $table ( ";
		$columns = implode(",", array_keys($data));
		$sql .= $columns;
		$sql .= " ) ";
		$sql .= " VALUES ( ";
		
		$values = implode("','", array_values($data));
		$sql .= "'". $values. "'";
		$sql .= " ) ";

		try {
			$result = $this->db->query($sql);
			if (!$result) {
				throw new Exception($this->db->error);
			}
		} catch (Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	public function update($table, $data, $where){
		$sql = "UPDATE $table SET ";
		foreach($data as $property=>$value){
			$sql.= "{$property}='{$value}', ";
		}
		$sql = rtrim($sql, ", ");
		$sql.= (" WHERE ".$where);
		try {
			$result = $this->db->query($sql);
			if (!$result) {
				throw new Exception($this->db->error);
			}
			return $result;
		} catch (Exception $e){
			throw new Exception($e->getMessage());
		}
	}
	public function delete($table, $where){
		try {
			$this->db->query("DELETE FROM $table WHERE $where");
			return true;
		} catch(Exception $e){
			throw new Exception ($e->getMessage());
		}
	}
	
	public function select($table, $where){
		
	}
	
}