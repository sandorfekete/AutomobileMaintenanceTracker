<?php

$automobile = new Automobile();

$makes_data = Database::getRows("
    SELECT 
        name AS label, 
        id AS value 
    FROM automobile_makes 
    ORDER BY id ASC
");

$types_data = Database::getRows("
    SELECT 
        name AS label, 
        id AS value 
    FROM automobile_types 
    ORDER BY id ASC
");

if (strpos(VIEW, 'add') !== false)
{
    $makes = Util::createSelectList(
        'automobile_make_id',
        $makes_data,
        [
            'class' => 'data required',
            'dataErrorLabel' => 'Make'
        ]
    );

    $types = Util::createSelectList(
        'automobile_type_id',
        $types_data,
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

    $makes = Util::createSelectList(
        'automobile_make_id',
        $makes_data,
        [
            'selected' => $automobile->get('automobile_make_id'),
            'class' => 'data required',
            'dataErrorLabel' => 'Automobile Make'
        ]
    );

    $types = Util::createSelectList(
        'automobile_type_id',
        $types_data,
        [
            'selected' => $automobile->get('automobile_type_id'),
            'class' => 'data required',
            'dataErrorLabel' => 'Automobile Type'
        ]
    );
    
    $year = $automobile->get('year');
    $model = $automobile->get('model');
    $colour = $automobile->get('colour');
    $plate = $automobile->get('plate');
    $odometer = $automobile->get('odometer');
    $date_created = $automobile->get('date_created');
    $date_modified = $automobile->get('date_modified');
}