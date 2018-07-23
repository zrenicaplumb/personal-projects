<?php

Class ResourceController {
	static function findById($id){
		$db = new DB();
		$result = $db->query("SELECT * FROM {static::$table} WHERE {static::$primary_key} = {$id}");
		$data = $result->fetch_assoc();
		if($data){
			$class = static::$class;
			return new $class($data);
		} else {
			return null;
		}
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
		return $data;
	}
	
}
