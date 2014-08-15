<?php 

use core\Route as Route;
use config\Config as Config;

set_include_path(APP_PATH.'/application/');
spl_autoload_extensions(".php");
spl_autoload_register();

include APP_PATH.'/application/core/route_map.php';
include APP_PATH.'/application/lib/Application_helper.php';

include APP_PATH.'/application/config/init_config.php';

// Config::data();
// exit; 
Route::Start();

?>