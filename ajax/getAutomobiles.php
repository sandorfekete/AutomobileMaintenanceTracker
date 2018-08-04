<?php

define('AJAX', 1);
define('PATH', dirname(dirname(__FILE__)));

require_once PATH . '/autoload.php';

AMT::init();

$fields = Util::getPostFields();

$limitRecords = RECORDS_PER_PAGE;
$limitOffset = $fields['limitOffset'];

$json = new stdClass();

if ($rows = getData())
{
    foreach ($rows as $row)
    {
        $dataRow = [];

        $dataRow[] = $row['id'];
        $dataRow[] = $row['year'];
        $dataRow[] = $row['make'];
        $dataRow[] = $row['model'];
        $dataRow[] = $row['plate'];
        $dataRow[] = $row['type'];
        $dataRow[] = $row['colour'];
        $dataRow[] = Util::numberCommas($row['odometer']);
        $dataRow[] = $row['date_created'];
        $dataRow[] = $row['date_modified'];

        $dataRow[] = '<button class="button" type="button" onclick="AMT.editRecord(' . $row['id'] . ')">EDIT</button>';

        $data[] = $dataRow;
    }

    $totalRecords = getTotalRecords();

    $json->data = Util::createTableRowData($data);
    $json->pagination = Util::getPagination($limitRecords, $limitOffset, $totalRecords);
    $json->recordsTotal = $totalRecords;
}
else
{
    $json->data = '<tr><td colspan="11" class="nodata">no data</td></tr>';
    $json->pagination = Util::getPagination($limitRecords, $limitOffset, 0);
    $json->recordsTotal = 0;
}

echo json_encode($json);

function getData($limit = true)
{
    global $limitRecords;
    global $limitOffset;

    $sql = "
        SELECT 
            a.*, 
            am.name AS make,
            at.name AS type
        ";

    $sql .=!$limit ? ", COUNT(a.id) AS Total" : '';

    $sql .= "
        FROM automobiles AS a
        LEFT JOIN automobile_makes AS am ON am.id = a.automobile_make_id
        LEFT JOIN automobile_types AS at ON at.id = a.automobile_type_id
        ORDER BY date_created DESC, date_modified DESC
	";

    $sql .= $limit ? " LIMIT " . ($limitOffset * $limitRecords) . ",$limitRecords" : '';

    $rows = Database::getRows($sql);

    return $rows;
}

function getTotalRecords()
{
    $row = Database::getRow("SELECT COUNT(id) AS Total FROM automobiles WHERE 1=1");

    return $row['Total'];
}
