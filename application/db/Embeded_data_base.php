<?php 

namespace db;


use db\Data_base as Data_base;
use config\Config as Config;
/**
* 
*/
class Embeded_data_base extends Data_base
{
	
	function __construct()
	{
		# code...
	}

	private static $embeded_storage = array(

		1 => array(

			'id' => 1,
			'lastName' => 'tim',
			'firstName' => 'bay'

		),
		2 => array(

			'id' => 2,
			'lastName' => 'tim2',
			'firstName' => 'bay2'

		),
		3 => array(

			'id' => 3,
			'lastName' => 'tim3',
			'firstName' => 'bay3'

		)

	);

	public static function __findAll($table_name) {
		return self::$embeded_storage;
	}

	public static function __findById($id, $table_name) {
		if(!isset(self::$embeded_storage[$id]))	return false;
		return self::$embeded_storage[$id];
	}

	public static function __save($list_params, $table_name) {
		return $list_params;
	}

	public static function __update($list_params, $table_name) {
		if(!isset(self::$embeded_storage[$id]))	return false;
		return self::$embeded_storage[$id];
	}

	public static function __delete($id, $table_name) {
		return true;
	}

	public static function __select_all($query){}

	public static function __select_one($query){}

	public static function __count($table_name){}

	public static function __paging($page, $limit, $table_name){}

	public static function __findBy($hash, $table_name, $like_modify = false, $or_modify = false) {
		return self::$embeded_storage[$id];
	}

	public static function __table_describe($table_name) {
		return array('id', 'lastName', 'firstName');
	}

	protected static function connect() {
	}

	protected static function close($connect){
	}
}

 ?>