<?php

define('AJAX', 1);
define('PATH', dirname(dirname(__FILE__)));

require_once PATH . '/autoload.php';

AMT::init();

$fields = AMT::getPostFields();

$automobile = new Automobile();

// EDIT
if (isset($fields['_id']))
{
    if ($automobile->fetch($fields['_id']))
    {
        $automobile->set('automobile_make_id', $fields['automobile_make_id']);
        $automobile->set('automobile_type_id', $fields['automobile_type_id']);
        $automobile->set('model', $fields['model']);
        $automobile->set('year', $fields['year']);
        $automobile->set('odometer', $fields['odometer']);
        $automobile->set('colour', $fields['colour']);
        $automobile->set('plate', $fields['plate']);

        $automobile->save();

        $result['type'] = 'success';
        $result['message'] = 'record edited';
    }
    else
    {
        $result['type'] = 'error';
        $result['message'] = 'record NOT edited';
    }
}
// ADD
else
{
    $automobile->set('automobile_make_id', $fields['automobile_make_id']);
    $automobile->set('automobile_type_id', $fields['automobile_type_id']);
    $automobile->set('model', $fields['model']);
    $automobile->set('year', $fields['year']);
    $automobile->set('odometer', $fields['odometer']);
    $automobile->set('colour', $fields['colour']);
    $automobile->set('plate', $fields['plate']);

    $automobile->save();

    $result['type'] = 'success';
    $result['message'] = 'record added';
}

echo json_encode($result);
