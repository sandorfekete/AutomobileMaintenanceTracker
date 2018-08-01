<?php

class Table 
{
	protected $_table_name = '';
	protected $_id = 0;
	
	protected $date_created = '';
	protected $date_modified = '';
	
	function __construct()
	{	
		return $this;
	}
	
//	public function fetchAll()
//	{
//		$query = "SELECT * FROM $this->_table_name";
//		
//		if (!$rows = Database::getRows($query)){
//			Error::log("data for the following query ( $query ) does not exist.", 'Table');
//		}
//		
//		return $rows;
//	}
	
	public function fetch($id)
	{ 
		if (!is_numeric($id)){
			Error::log("fetch 'id' of '$id' for ".get_class($this)." class is not numeric.", 'Table');
			return false;
		}
		
		$id = filter_var($id, FILTER_SANITIZE_NUMBER_INT);
		
		$query = "SELECT * FROM $this->_table_name WHERE id = $id";
		
		if (!$data = Database::getRows($query)){
			Error::log("data for the following query ( $query ) does not exist.", 'Table');
			return false;
		}
		
		foreach ($data as $prop => $value){
			if ($prop == 'id'){
				$this->_id = $value;
			} else {
				if (property_exists($this, $prop)){
					$this->set($prop, $value);
				}
			}
		}
		
		return $this;
	}
	
	public function get($prop)
	{
		if (property_exists($this, $prop)){
			return $this->{$prop};
		} else {
			Error::log("cannot GET; the property '$prop' does not exist in ".get_class($this)." class.", 'Table');
			return false;
		}
	}
	
	public function set($prop, $value)
	{
		if (property_exists($this, $prop)){
			if (strpos($prop, '_') === 0){
				Error::log("cannot SET reserved property '$prop' in ".get_class($this)." class.", 'Table');
				return false;
			}
			
			if (is_numeric($this->{$prop}) && is_numeric($value)){
				$value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
				$this->{$prop} = (int) $value;
			} else if (is_string($this->{$prop}) && is_string($value)){
				$value = filter_var($value, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
				$this->{$prop} = mysqli_real_escape_string(Database::$db, $value);
			} else {
				Error::log("cannot SET property '$prop' to '$value' in ".get_class($this)." class; type mismatch.", 'Table');
				return false;
			}
		} else {
			Error::log("cannot SET; the property '$prop' does not exist in ".get_class($this)." class.", 'Table');
			return false;
		}
		
		return $this;
	}
	
	public function save()
	{
		$props = get_class_vars(get_class($this));
		
		if ($this->_id != 0){
			$this->update($props);
		} else {
			$this->insert($props);
		}
	}
	
	protected function insert($props)
	{
		$this->date_created = Database::getCurrentTimestamp();
		
		$query = "INSERT INTO $this->_table_name ";
		
		foreach ($props as $name => $value){
			if (strpos($name, '_') !== 0){
				$queryProps[] = $name;
				
				if (is_string($value)){
					$queryValues[] = "'". $this->{$name} ."'";
				} else {
					$queryValues[] = $this->{$name};
				}
			}
		}
		
		$query .= "(" . implode(', ', $queryProps) . ") ";
		$query .= "VALUES (" . implode(', ', $queryValues) . ")";
		
		Database::execute($query);
	}
	
	protected function update($props)
	{
		$this->date_modified = Database::getCurrentTimestamp();
		
		$query = "UPDATE $this->_table_name SET ";
		
		foreach ($props as $name => $value){ 
			if (strpos($name, '_') !== 0){
				if (is_string($value)){
					$queryArray[] = "$name = '". $this->{$name} ."'";
				} else {
					$queryArray[] = "$name = " . $this->{$name};
				}
			}
		}
		
		$query .= implode(', ', $queryArray);
		$query .= " WHERE id = $this->_id";
		
		Database::execute($query);
	}
	
	public function delete()
	{
		$query = "DELETE FROM $this->_table_name WHERE id = $this->_id";
		
		Database::execute($query);
	}
	
}

