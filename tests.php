<?php

define('TESTING', 1);
define('NOERRORS', 1);

require_once 'autoload.php';

AMT::init();

$files = glob('*/_tests/index.php');

echo 'Starting Unit Tests...<br>';

if (!$files){
	echo 'No Unit Test Found';
	exit();
}

foreach ($files as $file){
	echo "<br>----------------------------------------------------------<br>";
	echo "<b>DIR: $file</b>";
	echo "<br>----------------------------------------------------------<br>";
	include $file;
}

echo '<br>Finished Unit Tests!';