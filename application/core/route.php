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
	public static function get($url, $controller, $action) {
		self::$_get[$url] = array('controller'=>$controller, 'action'=>$action);
	}

	/**
	*	Установка post маршрута 
	*/
	public static function post($url, $controller, $action) {
		self::$_post[$url] = array('controller'=>$controller, 'action'=>$action);
	}

	/**
	*	Установка put маршрута	 
	*/
	public static function put($url, $controller, $action) {
		self::$_put[$url] = array('controller'=>$controller, 'action'=>$action);
	}

	/**
	*	Установка delete маршрута	 
	*/
	public static function delete($url, $controller, $action) {
		self::$_delete[$url] = array('controller'=>$controller, 'action'=>$action);
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
		return $protocol[$_SERVER["REQUEST_URI"]];
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
		$controller->$action_name();
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
}

?>