<?php
Class DB {
	public function __construct($host="localhost", $username="bulbo", $password="root", $db_name="site1"){
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
		// error_object($values);
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
		error_object($data);
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
	public function singleUpdate($table, $email, $where){
		$sql = "UPDATE $table SET friends = $email";

	}
	public function delete($table, $where){
		try {
			$this->db->query("DELETE FROM $table WHERE $where");
			return true;
		} catch(Exception $e){
			throw new Exception ($e->getMessage());
		}
	}
	
	public function selectAll($table){
		$sql = "SELECT * FROM $table";
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
	
}