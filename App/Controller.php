<?php

namespace App;


class Controller
{

    public function model($model)
    {
        require_once(ROOTPATH.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.$model.'.php');
        $model_name = "App\\Models\\".$model;
        return new $model_name();
    }

    public function isAuth() {
        if (isset($_SESSION["auth"])) {
            return $_SESSION["auth"];
        }
        else return false;
    }

    public $layoutFile = 'Views/Layout.php';

    public function renderLayout ($body)
    {

        ob_start();
        require ROOTPATH.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.'Layout'.DIRECTORY_SEPARATOR."Layout.php";
        return ob_get_clean();

    }

    public function render ($viewName, array $params = [])
    {

        $viewFile = ROOTPATH.DIRECTORY_SEPARATOR.'Views'.DIRECTORY_SEPARATOR.$viewName.'.php';
        extract($params);
        ob_start();
        require $viewFile;
        $body = ob_get_clean();
        ob_end_clean();
        if (defined(NO_LAYOUT)){
            return $body;
        }
        return $this->renderLayout($body);

    }

}