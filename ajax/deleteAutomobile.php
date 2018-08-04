<?php

define('AJAX', 1);
define('PATH', dirname(dirname(__FILE__)));

require_once PATH . '/autoload.php';

AMT::init();

$fields = Util::getPostFields();

$automobile = new Automobile();

if (isset($fields['_id']))
{
    if ($automobile->fetch($fields['_id']))
    {
        $automobile->delete();

        $result['type'] = 'success';
        $result['message'] = 'record deleted';
    }
    else
    {
        $result['type'] = 'error';
        $result['message'] = 'record NOT deleted';
    }
}
else
{
    $result['type'] = 'error';
    $result['message'] = 'record id does not exist';
}

echo json_encode($result);
