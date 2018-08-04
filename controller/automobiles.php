<?php

$automobile = new Automobile();

$automobile_makes_data = Database::getRows("
    SELECT 
        name AS label, 
        id AS value 
    FROM automobile_makes 
    ORDER BY id ASC
");

$automobile_types_data = Database::getRows("
    SELECT 
        name AS label, 
        id AS value 
    FROM automobile_types 
    ORDER BY id ASC
");

if (strpos(VIEW, 'add') !== false)
{
    $automobile_makes = Util::createSelectList(
        'automobile_make_id',
        $automobile_makes_data,
        [
            'class' => 'data required',
            'dataErrorLabel' => 'Make'
        ]
    );

    $automobile_types = Util::createSelectList(
        'automobile_type_id',
        $automobile_types_data,
        [
            'class' => 'data required',
            'dataErrorLabel' => 'Type'
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

    $automobile->fetch($id);

    $automobile_makes = Util::createSelectList(
        'automobile_make_id',
        $automobile_makes_data,
        [
            'selected' => $automobile->get('automobile_make_id'),
            'class' => 'data required',
            'dataErrorLabel' => 'Automobile Make'
        ]
    );

    $automobile_types = Util::createSelectList(
        'automobile_type_id',
        $automobile_types_data,
        [
            'selected' => $automobile->get('automobile_type_id'),
            'class' => 'data required',
            'dataErrorLabel' => 'Automobile Type'
        ]
    );
}