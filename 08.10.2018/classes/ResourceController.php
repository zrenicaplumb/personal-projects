<?php

Class ResourceController {

	static function findById($id){
		$class = static::$class;
		$table = static::$table;
		
		$primary_key = static::$primary_key;
		
		$db = new DB();
		$result = $db->query("SELECT * FROM {$table} WHERE {$primary_key} = {$id}");
		// error_object($result);
		$data = $result->fetch_assoc();
		if($data){
			$class = static::$class;
			$object = new $class($data);
			return $object;
			// errorObject($object);
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
	static function createCartItem($data){
		$class = static::$class;
		$resource = new $class($data);
		$file_name = $data['image'];

		$resource->image = $file_name;
		return $resource->create();
	}

	static function create($data, $files=null){
		// error_object($data);
		$class = static::$class;
		$resource = new $class($data);
		// error_object($resource);
		if(!empty($files)){
			$file_name = $resource->uploadFile($files['image']);
			$resource->image = $file_name;
		}
		return $resource->create();
	}

	static function delete($id){
		// error_object($id);
		$resource = self::findById($id);
		// error_object($resource);
		$resource->delete();
		return $resource;
	}
	static function update($params){
		// $resource = self::findById($params['id']);
		// error_object($resource)
		
		
		
	}

	

	


	
	
}
