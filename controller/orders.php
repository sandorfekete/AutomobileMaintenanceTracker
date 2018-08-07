<?php

$order = new Order();

$types_data = Database::getRows("
    SELECT 
        name AS label, 
        id AS value 
    FROM order_types 
    ORDER BY id ASC
");

if (strpos(VIEW, 'add') !== false)
{
    $automobiles_data = Database::getRows("
        SELECT
            a.id AS value,
            CONCAT(a.year, ' ', am.name, ' ', a.model, ' - ', a.plate, ' - ', at.name) AS label,
            am.name AS make
        FROM automobiles AS a
        JOIN automobile_makes AS am ON am.id = a.automobile_make_id
        JOIN automobile_types AS at ON at.id = a.automobile_type_id
        ORDER BY year DESC, make ASC, model ASC
    ");

    $automobiles = Util::createSelectList(
        'automobile_id', 
        $automobiles_data,
        [
            'class' => 'data required',
            'dataErrorLabel' => 'Automobile',
            'attribs' => 'onchange="AMT.updateOrderTypes(this.value)"'
        ]
    );

    $types = Util::createSelectList(
        'order_type_id', 
        $types_data, 
        [
            'class' => 'data required',
            'dataErrorLabel' => 'Order Type'
        ]
    );
}
else if (strpos(VIEW, 'edit') !== false)
{
    $id = isset($_POST['_id']) ? (int) $_POST['_id'] : false;

    if (!$id)
    {
        echo 'ERROR - No Order id';
        exit();
    }

    $order->fetch($id);

    $automobile = Database::getRow("
        SELECT a.*, am.name AS make, at.name AS type 
        FROM automobiles AS a
        JOIN automobile_makes AS am ON am.id = a.automobile_make_id
        JOIN automobile_types AS at ON at.id = a.automobile_type_id
        WHERE a.id = " . $order->get('automobile_id') . "
    ");

    $types = Util::createSelectList(
        'order_type_id',
        $types_data,
        [
            'selected' => $order->get('order_type_id'),
            'attribs' => 'readonly="readonly" disabled="disabled"',
            'dataErrorLabel' => 'Order Type'
        ]
    );
    
    $notes = $order->get('notes');
    $odometer = $order->get('odometer');
    $date_created = $order->get('date_created');
    $date_modified = $order->get('date_modified');
}