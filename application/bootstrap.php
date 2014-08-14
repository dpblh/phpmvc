<?php 

use core\Route as Route;

set_include_path(APP_PATH.'/application/');
spl_autoload_extensions(".php");
spl_autoload_register();

include APP_PATH.'/application/core/route_map.php';
include APP_PATH.'/application/lib/Application_helper.php';


Route::Start();

?>