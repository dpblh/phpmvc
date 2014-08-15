<?php 
namespace core;

use controllers;
use lib\NotFoundException as NotFoundException;
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
		self::create_path_info('get', '/', $controller, $action);
	}

	/**
	*	Установка get маршрута 
	*/
	public static function get($url_template, $controller, $action) {
		self::create_path_info('get', $url_template, $controller, $action);
	}

	/**
	*	Установка post маршрута 
	*/
	public static function post($url_template, $controller, $action) {
		self::create_path_info('post', $url_template, $controller, $action);
	}

	/**
	*	Установка put маршрута	 
	*/
	public static function put($url_template, $controller, $action) {
		self::create_path_info('put', $url_template, $controller, $action);
	}

	/**
	*	Установка delete маршрута	 
	*/
	public static function delete($url_template, $controller, $action) {
		self::create_path_info('delete', $url_template, $controller, $action);
	}

	/**
	*	Пуск маршрутизации	 
	*/
	public static function Start() {

		$rout = self::get_route();
		self::cell_action($rout);

	}

	//private block

	private static function redirect_404() {
		header('Location: /404');
		exit;
	}

	private static function get_route() {
		$protocol = self::protocol();
		foreach ($protocol as $key => $val) {
			if(self::match_path($_SERVER["REQUEST_URI"], $key))	return $protocol[$key];
		}
	}

	private static function protocol() {
		if(isget())		return self::$_get;
		if(isput())		return self::$_put;
		if(isdelete())	return self::$_delete;
		if(ispost())	return self::$_post;
		throw new Exception();
	}

	private static function cell_action($route) {
		$controller_name = 'controllers\Controller_'.$route['controller'];
		try{
			if(class_exists($controller_name)){
				$controller = new $controller_name;
			}
		}catch(NotFoundException $e){
			self::redirect_404();			
		}catch(\LogicException $e){
			self::redirect_404();			
		}
		$action_name = $route['action'];
		$params = self::getParams($_SERVER["REQUEST_URI"], $route['params_name']);
		$controller->params = $params;
		$controller->$action_name();
	}

	private static function create_path_info($protocol, $url_template, $controller, $action) {
		$url_template_info = self::create_path_matcher($url_template);
		if($protocol == 'get') self::$_get[$url_template_info['match']] = array('controller'=>$controller, 'action'=>$action, 'params_name'=>$url_template_info['params_name']);
		if($protocol == 'post') self::$_post[$url_template_info['match']] = array('controller'=>$controller, 'action'=>$action, 'params_name'=>$url_template_info['params_name']);
		if($protocol == 'put') self::$_put[$url_template_info['match']] = array('controller'=>$controller, 'action'=>$action, 'params_name'=>$url_template_info['params_name']);
		if($protocol == 'delete') self::$_delete[$url_template_info['match']] = array('controller'=>$controller, 'action'=>$action, 'params_name'=>$url_template_info['params_name']);
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
		preg_match('/^'.$url_matche.'$/', parse_url($url_path, PHP_URL_PATH), $out);
		return count($out) != 0;
	}

	private static function getParams($url_path, $params_name) {
		$params = array();
		$url_path = explode('/', parse_url($url_path, PHP_URL_PATH));

		while (list($key, $val) = each($params_name)) {
		  $params[$val] = $url_path[$key];
		}
		if(isget()) $params = array_merge($params, $_GET);
		if(ispost()) $params = array_merge($params, $_POST);
		// print_r($params);
		return $params;
	}
}

?>