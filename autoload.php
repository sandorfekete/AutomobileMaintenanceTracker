<?php

if (!defined('PATH'))
{
    define('PATH', dirname(__FILE__));
}

spl_autoload_register(function ($class_name){
    
    $pathCore = PATH . "/core/$class_name.php";
    $pathHelper = PATH . "/helper/$class_name.php";
    $pathModel = PATH . "/model/$class_name.php";

    if (file_exists($pathCore))
    {
        require_once $pathCore;
    }
    else if (file_exists($pathHelper))
    {
        require_once $pathHelper;
    }
    else if (file_exists($pathModel))
    {
        require_once $pathModel;
    }
});
