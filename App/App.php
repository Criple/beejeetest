<?php

namespace App;

class App

{

    public static $router;

    public static $db;

    public static $kernel;


    public static function init()
    {
        spl_autoload_register(['static','loadClass']);
        static::bootstrap();
        set_exception_handler(['App\App','handleException']);

    }

    public static function bootstrap()
    {
        static::$router = new Router();
        static::$kernel = new Kernel();
        static::$db = new Db();

    }

    public static function loadClass ($className)
    {

        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $file = ROOTPATH.DIRECTORY_SEPARATOR.$className.'.php';
        if(file_exists($file)) {
            require_once $file;
        }

    }

    public static function handleException (\Throwable $e)
    {
        echo '<pre>';
        var_dump($e);
        echo '</pre>';
        if($e instanceof \App\Exceptions\InvalidRouteException) {
            echo static::$kernel->launchAction('Error', 'error404', [$e]);
        }else{
            echo static::$kernel->launchAction('Error', 'error500', [$e]);
        }

    }

}