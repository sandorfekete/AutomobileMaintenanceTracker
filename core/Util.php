<?php

class Util
{

    public static function getPostFields()
    {
        $fields = array();
        reset($_POST);

        for ($c = 0; $c < count($_POST); $c++)
        {
            $value = trim(strip_tags(current($_POST)));
            $fields[key($_POST)] = $value;
            next($_POST);
        }

        return $fields;
    }

    public static function createSelectList($id, $data, $options = false)
    {
        $selected = isset($options['selected']) ? $options['selected'] : '';
        $class = isset($options['class']) ? $options['class'] : '';
        $attribs = isset($options['attribs']) ? $options['attribs'] : '';
        $dataErrorLabel = isset($options['dataErrorLabel']) ? $options['dataErrorLabel'] : '';

        $html = '<select id="' . $id . '" name="' . $id . '" data-error-label="' . $dataErrorLabel . '" class="' . $class . '" ' . $attribs . '>';
        $html .= '<option value="">-- select --</option>';

        foreach ($data as $d)
        {
            $makeSelected = $d['value'] == $selected ? 'selected' : '';
            $html .= '<option value="' . $d['value'] . '" ' . $makeSelected . '>' . $d['label'] . '</option>';
        }

        $html .= '</select>';

        return $html;
    }

    public static function createTableRowData($data)
    {
        $html = '';

        foreach ($data as $row)
        {
            $html .= '<tr data-row-id="' . $row[0] . '">';

            foreach ($row as $item)
            {
                $html .= '<td>' . $item . '</td>';
            }

            $html .= '</tr>';
        }

        return $html;
    }

    public static function getPagination($limitRecords, $limitOffset, $totalRecords)
    {
        $numPages = ceil($totalRecords / $limitRecords);

        $firstPage = 0;
        $lastPage = $numPages - 1;
        $currPage = $limitOffset;

        $prevPage = $currPage > $firstPage ? $currPage - 1 : $firstPage;
        $nextPage = $currPage < $lastPage ? $currPage + 1 : $lastPage;

        $html = '';

        $html .= '<li class="first" data-limit-offset="' . $firstPage . '">First</li>';

        if ($currPage > $firstPage)
        {
            $html .= '<li class="previous" data-limit-offset="' . $prevPage . '">Previous</li>';
        }

        for ($i = $currPage; $i < $currPage + 10; $i++)
        {
            if ($i < $lastPage + 1)
            {
                $html .= '<li class="' . ($i == $currPage ? 'active' : '') . '" data-limit-offset="' . $i . '">' . ($i + 1) . '</li>';
            }
        }

        if ($currPage < $lastPage)
        {
            $html .= '<li class="next" data-limit-offset="' . $nextPage . '">Next</li>';
        }

        $html .= '<li class="last" data-limit-offset="' . $lastPage . '">Last</li>';

        return $html;
    }

    public static function numberCommas($number)
    {
        $components = explode('.', (string) $number);

        if (count($components) === 1)
        {
            $components[0] = $number;
        }

        $components[0] = preg_replace('/\D/', "", $components[0]);
        $components[0] = preg_replace('/\B(?=(\d{3})+(?!\d))/', ",", $components[0]);

        if (count($components) === 2)
        {
            $components[1] = preg_replace('/\D/', "", $components[1]);
        }

        return implode(".", $components);
    }

    public static function log($var, $exit = false)
    {
        echo '<pre>';
        print_r($var);
        $exit ? exit() : null;
    }

}