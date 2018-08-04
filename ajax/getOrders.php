<?php

define('AJAX', 1);
define('PATH', dirname(dirname(__FILE__)));

require_once PATH . '/autoload.php';

AMT::init();

$fields = AMT::getPostFields();

$limitRecords = RECORDS_PER_PAGE;
$limitOffset = $fields['limitOffset'];

$json = new stdClass();

if ($rows = getData())
{
    foreach ($rows as $row)
    {
        $dataRow = [];

        $dataRow[] = $row['id'];
        $dataRow[] = $row['automobile'];
        $dataRow[] = $row['order_type'];
        $dataRow[] = $row['notes'];
        $dataRow[] = $row['date_created'];
        $dataRow[] = $row['date_modified'];

        $dataRow[] = '<button class="button" type="button" onclick="AMT.editRecord(' . $row['id'] . ')">EDIT</button><button class="button delete" type="button" onclick="AMT.deleteRecord(' . $row['id'] . ')">DEL</button>';

        $data[] = $dataRow;
    }

    $totalRecords = getTotalRecords();

    $json->data = AMT::createTableRowData($data);
    $json->pagination = AMT::getPagination($limitRecords, $limitOffset, $totalRecords);
    $json->recordsTotal = $totalRecords;
}
else
{
    $json->data = '<tr><td colspan="7" class="nodata">no data</td></tr>';
    $json->pagination = AMT::getPagination($limitRecords, $limitOffset, 0);
    $json->recordsTotal = 0;
}

echo json_encode($json);

function getData($limit = true)
{
    global $limitRecords;
    global $limitOffset;

    $sql = "
        SELECT 
            o.*, 
            CONCAT(a.year, ' ', am.name, ' ', a.model, '<br>', a.plate, ' - ', o.odometer, 'km<br>', at.name) AS automobile,
            ot.name AS order_type 
        ";

    $sql .=!$limit ? ", COUNT(o.id) AS Total" : '';

    $sql .= "
        FROM orders AS o
        LEFT JOIN automobiles AS a ON a.id = o.automobile_id
        LEFT JOIN automobile_makes AS am ON am.id = a.automobile_make_id
        LEFT JOIN automobile_types AS at ON at.id = a.automobile_type_id
        LEFT JOIN order_types AS ot ON ot.id = o.order_type_id
        ORDER BY date_created DESC, date_modified DESC
    ";

    $sql .= $limit ? " LIMIT " . ($limitOffset * $limitRecords) . ",$limitRecords" : '';

    $rows = Database::getRows($sql);

    return $rows;
}

function getTotalRecords()
{
    $row = Database::getRow("SELECT COUNT(id) AS Total FROM orders WHERE 1=1");

    return $row['Total'];
}
