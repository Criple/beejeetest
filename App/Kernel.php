<?php

namespace App;

use \App\App;


class Kernel
{

    public $defaultControllerName = 'Home';

    public $defaultActionName = "index";

    public $allowedActions = array('Home\\index', 'Authorization\\index', 'Home\\newtask', 'Home\\newtaskapply');



    public function launch()
    {

        list($controllerName, $actionName, $params) = App::$router->resolve();
        echo $this->launchAction($controllerName, $actionName, $params);

    }


    public function launchAction($controllerName, $actionName, $params)
    {
        $controllerName = $contollerNameForAuth = empty($controllerName) ? $this->defaultControllerName : ucfirst($controllerName);

        if(!file_exists(ROOTPATH.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.$controllerName.'.php')){
            throw new \InvalidArgumentException();
        }

        require_once ROOTPATH.DIRECTORY_SEPARATOR.'Controllers'.DIRECTORY_SEPARATOR.$controllerName.'.php';

        if(!class_exists("\\App\\Controller\\".ucfirst($controllerName))){
            throw new \InvalidArgumentException();
        }
        $controllerName = "App\\Controller\\".ucfirst($controllerName);
        $controller = new $controllerName();
        $actionName = empty($actionName) ? $this->defaultActionName : $actionName;
        if (!method_exists($controller, $actionName)){
            throw new \InvalidArgumentException();
        }
        $curAction = $contollerNameForAuth.'\\'.$actionName;
        if (!in_array($curAction, $this->allowedActions)){
            if (!$controller->isAuth()) {
                //$defController = "App\\Controller\\Home";
                //$controller = new $defController();
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/');
                return;
            }
        }
        return $controller->$actionName($params);

    }

}