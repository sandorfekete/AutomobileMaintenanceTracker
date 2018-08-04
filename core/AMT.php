<?php

date_default_timezone_set('America/Edmonton');

class AMT
{

    public static $viewUrl = '';
    public static $isLocal = false;
    public static $segments = null;
    public static $controller = false;
    public static $view = false;

    public static function init()
    {
        self::initVars();
        Database::init();
    }

    public static function initVars()
    {
        define('ACCESS', 1010);

        define('TIMESTAMP', strtotime("now"));
        define('DATETIME', date('Y-m-d H:i:s'));

        define('ENV', stripos($_SERVER['SERVER_NAME'], 'sandorfekete.com') === false ? 'local' : 'live');

        define('CLR_GREEN', 'green');
        define('CLR_RED', 'red');

        define('RECORDS_PER_PAGE', 10);

        $serverName = 'http://' . $_SERVER['SERVER_NAME'];
        $scriptName = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

        if (ENV == 'live')
        {
            $BASEURL = $serverName . '/AutomobileMaintenanceTracker';
        }
        else
        {
            $BASEURL = $serverName . $scriptName;
        }

        define('BASEURL', $BASEURL);

        self::$viewUrl = isset($_REQUEST['view']) ? rtrim($_REQUEST['view'], '/') : 'home';
        self::$segments = explode('/', self::$viewUrl);

        self::$controller = self::$segments[0];
        self::$view = self::$segments[count(self::$segments) - 1];

        $indexExist = count(glob('view/' . self::$viewUrl . '/index.php')) > 0 ? true : false;
        $viewExist = count(glob('view/' . self::$viewUrl . '.php')) > 0 ? true : false;

        self::$view = $indexExist ? self::$viewUrl . '/index' : self::$viewUrl;
        self::$view = $indexExist || $viewExist ? self::$view : '404';

        define('CONTROLLER', self::$controller);
        define('VIEW', self::$view);
    }

}