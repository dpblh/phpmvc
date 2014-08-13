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

	private static $_get = array();
	private static $_post = array();
	private static $_put = array();
	private static $_delete = array();
	/**
	*	Установка handlera на рутовый путь
	*/
	public static function root($controller, $action) {
		self::get('/', $controller, $action);
	}

	/**
	*	Установка get маршрута 
	*/
	public static function get($url_template, $controller, $action) {
		self::create_path_info(self::$_get)
	}

	/**
	*	Установка post маршрута 
	*/
	public static function post($url_template, $controller, $action) {
		self::create_path_info(self::$_post)
	}

	/**
	*	Установка put маршрута	 
	*/
	public static function put($url_template, $controller, $action) {
		self::create_path_info(self::$_put)
	}

	/**
	*	Установка delete маршрута	 
	*/
	public static function delete($url_template, $controller, $action) {
		self::create_path_info(self::$_delete)
	}

	/**
	*	Пуск маршрутизации	 
	*/
	public static function Start() {

		try{
			$rout = self::get_route();
			self::class_loader($rout);
			self::cell_action($rout);
		} catch(Exception $e) {
			header('Location: /404');
			exit;
		}


	}

	//private block

	private static function get_route() {
		$protocol = self::protocol();
		while (list($key, $val) = each($protocol)) {
			if(self::match_path($_SERVER["REQUEST_URI"], $key))	retrun $val;
		}
	}

	private static function protocol() {
		if(isget())		return self::$_get;
		if(ispost())	return self::$_post;
		if(isput())		return self::$_put;
		if(isdelete())	return self::$_delete;
		throw new Exception();
	}

	private static function cell_action($route) {
		$controller_name = 'Controller_'.$route['controller'];
		$controller = new $controller_name;
		$action_name = $route['action'];
		$params = self::getParams($_SERVER["REQUEST_URI"], $route['params_name']);
		$controller->$action_name($params);
	}

	private static function class_loader($route) {
		if(file_exists(APP_PATH.'/application/models/Model_'.$route['controller'].'.php')){
			include APP_PATH.'/application/models/Model_'.$route['controller'].'.php';
		}
		if(file_exists(APP_PATH.'/application/controllers/Controller_'.$route['controller'].'.php')){
			include APP_PATH.'/application/controllers/Controller_'.$route['controller'].'.php';
		}else{
			throw new Exception();
		}
	}

	private static function create_path_info($array_protocol) {
		$url_template_info = self::create_path_matcher($url_template);
		$array_protocol[$url_template_info['match']] = array('controller'=>$controller, 'action'=>$action, 'params_name'=>$url_template_info['params_name']);
	}

	private static function create_path_matcher($url_template) {
	    $match_template = array();
	    $params_name = array();
	    
	    $url_template_array = explode('/', $url_template);
	    
	    while (list($key, $val) = each($url_template_array)) {
	      $temp = $val;
	      preg_match('/:(\w*)/', $val, $hech_params);
	      
	      if(count($hech_params) >= 1){
	        $params_name[$key] = $hech_params[1];
	        $temp = '\w*';
	      }
	      $match_template[]= $temp;
	    
	    }
	    $match_template = implode('\/', $match_template);
	    return array('match'=>$match_template, 'params_name'=>$params_name);
  	}
  
  private static function match_path($url_path, $url_matche) {
    preg_match('/'.$url_matche.'/', $url_path, $out);
    return count($out) != 0;
  }
  
  private static function getParams($url_path, $params_name) {
    $params = array();
    $url_path = explode('/', $url_path);
    
    while (list($key, $val) = each($params_name)) {
      $params[$val] = $url_path[$key];
    }
    return $params;
  }
}

?>