<?php 
// include APP_PATH.'/application/core/model.php';
// include APP_PATH.'/application/core/view.php';
// include APP_PATH.'/application/core/controller.php';

// include APP_PATH.'/application/core/route.php';

set_include_path(APP_PATH.'/application/');
spl_autoload_extensions(".php");
spl_autoload_register();

include APP_PATH.'/application/core/route_map.php';
include APP_PATH.'/application/lib/Application_helper.php';


Route::Start();

?>