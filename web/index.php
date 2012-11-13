<?php
define('SYSTEM', 1);

require_once '../vendor/router.php';

Router::_init();

require_once '../src/controllers/main.php';
require_once '../src/controllers/demo.php';
require_once '../src/controllers/prueba.php';

try{
    Router::run();
}
catch(RouteNotFoundException $e)
{
    die('Page not found');
}
