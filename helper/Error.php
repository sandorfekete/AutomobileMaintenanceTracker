<?php

class Error
{
	// $severity ('ERROR'|'WARNING'|'NOTICE')
	public static function log($message, $source='', $severity='ERROR')
	{
		$msg = '<br>';
		$msg .= $source != '' ? "$severity($source): " : "$severity: ";
		$msg .= $message;
		$msg .= '<br>';
		
		switch ($severity)
		{
			case 'ERROR': exit($msg); break;
			case 'WARNING': echo $msg; break;
			case 'NOTICE': echo $msg; break;
			default: echo $msg; break;
		}
	}
			
}
