<?php

namespace App\Controller;

use \App\Controller;

class Error extends Controller
{

    public function error404 ()
    {

        return $this->render('404');

    }

    public function error500 ()
    {

        return $this->render('500');

    }

}