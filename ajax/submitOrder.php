<?php

define('AJAX', 1);
define('PATH', dirname(dirname(__FILE__)));

require_once PATH . '/autoload.php';

AMT::init();

$fields = AMT::getPostFields();

$order = new Order();

// EDIT
if (isset($fields['_id']))
{
    if ($order->fetch($fields['_id']))
    {
        $order->set('notes', $fields['notes']);
        $order->set('odometer', $fields['odometer']);

        $order->save();

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
    $order->set('automobile_id', $fields['automobile_id']);
    $order->set('order_type_id', $fields['order_type_id']);
    $order->set('notes', $fields['notes']);
    $order->set('odometer', $fields['odometer']);

    $order->save();

    $result['type'] = 'success';
    $result['message'] = 'record added';
}

echo json_encode($result);
