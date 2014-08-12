<?php 

/**
* 
*/
class Route
{
	
	function __construct()
	{
		# code...
	}

	public static function Start() {

		$controller_name = "index";
		$action_name = "index";
		$action_params = array();

		$route_array = explode('/', $_SERVER["REQUEST_URI"]);

		if(!empty($route_array[1])){
			$controller_name = $route_array[1];
		}

		if(!empty($route_array[2])){
			$action_name = $route_array[2];
		}

		$model_name = "Model_".$controller_name;
		$view_name = "View_".$controler_name;
		$controller_name = "Controller_".$controller_name;
		$action_name = $action_name;

		if(file_exists(APP_PATH.'/application/models/'.$model_name.'.php')){
			include APP_PATH.'/application/models/'.$model_name.'.php';
		}

		if(file_exists(APP_PATH.'/application/controllers/'.$controller_name.'.php')){
			include APP_PATH.'/application/controllers/'.$controller_name.'.php';
			$controller = new $controller_name();
			if(!method_exists($controller, $action_name)){
				header('Location: /404');
				exit;	
			}
			$controller->$action_name();
		}else{
			header('Location: /404');
			exit;
		}


	}
}

?>