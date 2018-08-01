<?php

class Order extends Table
{	
	protected $automobile_id = 0;
	protected $order_type_id = 0;
	protected $notes = '';
	protected $date_completed = '';
	
	function __construct()
	{	
		$this->_table_name = 'orders';
		
		return $this;
	}
}

