<?php

Class ResourceController {

	static function findById($id){
		$class = static::$table;
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
	static function findByEmail($email){
		$db = new DB();
		$result = $db->query("SELECT * FROM {static::$table} WHERE {static::$email} = {$email}");
		$data = $result->fetch_assoc();
		if($data){
			$class = static::$class;
			return new $class($data);
		} else {
			return null;
		}
	}
	static function login($email, $password){
		$db = new DB();
		$result = $db->query("SELECT * FROM {static::$table} WHERE {static::$email} = {$email} AND {static::$password} = {$password}");
		$data = $result->fetch_assoc();
		if($data){
			$class = static::$class;
			return new $class($data);
		} else {
			return null;
		}
	}
	static function create($data, $files){
		$class = static::$class;
		$resource = new $class($data);

		if(!empty($files)){
			$file_name = $resource->uploadFile($files['image']);
		}

		$resource->image = $file_name;

		return $resource->create();
	}

	


	
	
}
