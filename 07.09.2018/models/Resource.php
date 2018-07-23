<?php 

Class Resource {
	public function __construct($item){
		$this->db = new Db();
		if(is_array($item)){
			//assume you've passed in a block of properties for this resource
			foreach($item as $property=>$value){
				$this->{$property} = $value;
			}
		} elseif(is_numeric($item)){
			//assume you've passed in an id, and fetch the data from the db row
			$sql = "SELECT * FROM {$this->table} WHERE {$this->primary_key} = $this->{$this->primary_key}";
			error_log($sql);
			$result = $this->db->query($sql);
			if($result){
				foreach($result as $property=>$value){
					$this->{$property} = $value;
				}
			}
		} else {
			//do nothing
		}
	}
	
	public function getColumns(){
		$columns = [];
		$result = $this->db->query("DESCRIBE ".$this->table)->fetch_all();
		foreach($result as $column){
			$columns[] = $column[0];
		}
		$this->columns = $columns;
		return $this;
	}

	public function model(){
		$data = [];
		$this->getColumns();
		foreach($this->columns as $column){
			if(property_exists($this, $column)){
				$data[$column] = $this->{$column};
			} else {
				$data[$column] = null;
			}
		}
		return $data;
	}





}


