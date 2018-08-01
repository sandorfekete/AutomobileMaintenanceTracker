<?php

spl_autoload_register(function ($class_name) {
	
	$pathCore = "core/$class_name.php";
	$pathHelper = "helper/$class_name.php";
	$pathModel = "model/$class_name.php";
	
	if (file_exists($pathCore)){
		require_once $pathCore;
	} else if (file_exists($pathHelper)){
		require_once $pathHelper;
	} else if (file_exists($pathModel)){
		require_once $pathModel;
	}
	
});
