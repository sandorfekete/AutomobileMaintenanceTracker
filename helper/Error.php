<?php

class Error
{
	// $severity ('ERROR'|'WARNING'|'NOTICE')
	public static function log($message, $source='', $severity='ERROR')
	{
		$msg = '<br><i><span style="color:'.CLR_RED.'">';
		$msg .= $source != '' ? "$severity($source): " : "$severity: ";
		$msg .= $message;
		$msg .= '</span></i>';
		
		echo (! defined('TESTING_MODE') ? $msg : '');
	}
			
}
