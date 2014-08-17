<?php 
namespace db;

use core\Config as Config;
/**
* 
*/
abstract class Data_base
{

	public static $config;
	
	function __construct()
	{
		
	}

	public static function __findAll($table_name){}

	public static function __findById($id, $table_name){}

	public static function __save($list_params, $table_name){}

	public static function __update($list_params, $table_name){}

	public static function __delete($id, $table_name){}

	public static function __select_all($query){}

	public static function __select_one($query){}

	public static function __findBy($hash, $table_name, $like_modify = false, $or_modify = false){}

	public static function __count($table_name){}

	public static function __paging($page, $limit, $table_name){}

	public static function __table_describe($table_name){}

	protected static function connect(){}

	protected static function close($connect){}




	// interceptor

	public static function __callStatic($method, $arguments) {
      	$method = '__'.$method;
		$current_class = get_called_class();
		$connect = $current_class::connect();
		$rows = call_user_func_array("$current_class::$method", $arguments);
		$current_class::close($connect);
		return $rows;
    }
}

 ?>