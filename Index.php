<?php

namespace App;

use \App\App;

ini_set('display_errors', 1);

define('ROOTPATH', __DIR__);

require ROOTPATH.DIRECTORY_SEPARATOR.'App'.DIRECTORY_SEPARATOR.'App.php';


App::init();
App::$kernel->launch();
