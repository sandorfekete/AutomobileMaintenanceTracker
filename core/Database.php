<?php

class Database
{
	public static $db = null;
	
	public static function init()
	{
		self::initDB();
	}
	
	public static function initDB()
	{
		if (ENV == 'live')
		{
			self::$db = mysqli_connect("localhost", "pixelate_amt", "Ov@oiMX-!yA!", "pixelate_amt");
		}
		else
		{
			self::$db = mysqli_connect("localhost", "root", "", "AutoMainTrack");
		}

		if (!self::$db)
		{
			echo "Error: Unable to connect to MySQL." . PHP_EOL;
			echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
			echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
			exit;
		}
	}
	
	public static function getRows($query, $assoc=true)
	{ 
		$result = mysqli_query(self::$db, $query);
		
		if (!$result || $result->num_rows === 0)
		{
			return false;
		}
		
		if ($assoc)
		{
			while ($row = mysqli_fetch_assoc($result))
			{
				$rows[] = $row;
			}
		}
		else
		{
			while ($row = mysqli_fetch_object($result))
			{
				$rows[] = $row;
			}
		}
		
		return isset($rows) ? $rows : false;
	}
	
	public static function getRow($query, $assoc=true)
	{ 
		$result = mysqli_query(self::$db, $query);
		
		if (!$result || $result->num_rows === 0)
		{
			return false;
		}
		
		if ($assoc)
		{
			while ($row = mysqli_fetch_assoc($result))
			{
				$rows[] = $row;
			}
		}
		else
		{
			while ($row = mysqli_fetch_object($result))
			{
				$rows[] = $row;
			}
		}
		
		return isset($rows) ? $rows[0] : false;
	}
	
	public static function execute($query)
	{
		$result = mysqli_query(self::$db, $query);
		return $result;
	}
	
	public static function getCurrentTimestamp()
	{
		return date("Y-m-d H:i:s");
	}
	
}
