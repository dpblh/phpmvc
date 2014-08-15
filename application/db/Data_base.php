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

	public static function __table_describe($table_name){}

	protected static function connect(){}

	protected static function close($connect){}




	// interceptor

	public static function __callStatic($method, $arguments) {
      	$method = '__'.$method;
		$connect = self::connect();
		$current_class = get_called_class();
		$rows = call_user_func_array("$current_class::$method", $arguments);
		self::close($connect);
		return $rows;
    }
}

 ?>