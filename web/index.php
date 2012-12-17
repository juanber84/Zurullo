<?php
define('SYSTEM', 1);

require_once '../vendor/router.php';

Router::_init();

$path= '../src/controllers/';
$directory=dir($path);	
while ($file = $directory->read())
{
	if ($file!='.' && $file!='..' && $file!='.DS_Store') {
		require_once $path.$file;
	}	
}
$directory->close();

try{
    Router::run();
}
catch(RouteNotFoundException $e)
{
    die('Page not found');
}
