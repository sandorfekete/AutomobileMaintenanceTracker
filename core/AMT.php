<?php

date_default_timezone_set('America/Edmonton');

class AMT
{
	public static function init()
	{
		self::initVars();
		Database::init();
	}
			
	public static function initVars()
	{
		define('ACCESS', 1010);
		
		define('TIMESTAMP', strtotime("now"));
		define('DATETIME', date('Y-m-d H:i:s'));
		
		define('ENV', stripos($_SERVER['SERVER_NAME'], 'sandorfekete.com') === false ? 'local' : 'live');
		
		define('CLR_GREEN', 'green');
		define('CLR_RED', 'red');
		
		$serverName = 'http://'.$_SERVER['SERVER_NAME'];
		$scriptName = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);
		
		if (ENV == 'live'){
			$BASEURL = $serverName;
		} else {
			$BASEURL = $serverName.$scriptName;
		}
		
		define('BASEURL', $BASEURL);
	}
	
	public static function getFields()
	{
		$fields = array();
		reset($_POST);
		
		for ($c = 0; $c < count($_POST); $c++){
			$value = trim(strip_tags(current($_POST)));

			if ($value == ''){
				//return false;
			}

			$fields[key($_POST)] = $value;
			next($_POST);
		}

		return $fields;
	}

	public static function createList($id, $data, $selected='', $classes=false)
	{
		$html = '<select id="'.$id.'" name="'.$id.'" class="'.$classes.'">';
		$html .= '<option value="">-- select --</option>';
		
		foreach ($data as $d)
		{
			$selected = $d['value'] == $selected ? 'selected' : '';
			$html .= '<option value="'.$d['value'].'" '.$selected.'>'.$d['label'].'</option>';
		}
		
		$html .= '</select>';
		
		return $html;
	}	
	
}
