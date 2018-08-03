<?php

class Automobile extends Table
{	
	protected $automobile_make_id = 0;
	protected $automobile_type_id = 0;
	protected $model = '';
	protected $year = 0;
	protected $odometer = 0;
	protected $colour = '';
	protected $plate = '';
	
	function __construct()
	{	
		$this->_table_name = 'automobiles';
		
		return $this;
	}
}
