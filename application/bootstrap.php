<?php 
include APP_PATH.'/application/core/model.php';
include APP_PATH.'/application/core/view.php';
include APP_PATH.'/application/core/controller.php';

include APP_PATH.'/application/core/route.php';
include APP_PATH.'/application/core/route_map.php';

include APP_PATH.'/application/lib/Application_helper.php';
echo $_SERVER['REQUEST_METHOD'];

Route::Start();

?>