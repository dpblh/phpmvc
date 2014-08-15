<?php 

namespace db;


use db\Data_base as Data_base;
use config\Config as Config;
/**
* 
*/
class MySql_data_base extends Data_base
{
	
	function __construct()
	{
		# code...
	}

	public static function __findAll($table_name) {
		$rows = mysql_query('select * from '.$table_name) or die('Запрос не удался: ' . mysql_error());
		$temp = array();
		while ($line = mysql_fetch_array($rows, MYSQL_ASSOC)) {
			$temp[]= $line;
		}
		return $temp;
	}

	public static function __findById($id, $table_name) {
		return mysql_fetch_array(mysql_query('select * from '.$table_name.' where id = '.mysql_real_escape_string($id)));
	}

	public static function __save($list_params, $table_name) {
		$keys_sql = array();
		$values_sql = array();
		print_r($list_params);
		foreach ($list_params as $key => $value) {
			$keys_sql[]= $key;
			$values_sql[]= '"'.mysql_real_escape_string($value).'"';
		}
		return mysql_query('insert into '.$table_name.' ('.implode(', ', $keys_sql).') values ('.implode(', ', $values_sql).')');
	}

	public static function __update($list_params, $table_name) {
		$update_values = array();
		$id = $list_params['id'];
		foreach ($list_params as $key => $value) {
			$update_values[]= $key.'='.'"'.mysql_real_escape_string($value).'"';
		}
		mysql_query('update '.$table_name.' set '.implode(', ', $update_values).' where id = '.$id) or die('Обнавление не удалось: ' . mysql_error());
		return $list_params;
	}

	public static function __delete($id, $table_name) {
		return mysql_query('delete from '.$table_name.' where id='.mysql_real_escape_string($id));
	}

	public static function __select_all($query) {
		return mysql_query($query);
	}

	public static function __findBy($column_name, $value, $table_name) {
		$rows = mysql_query('select * from '.$table_name.' where '.$column_name.'="'.mysql_real_escape_string($value).'"') or die('Запрос не удался: ' . mysql_error());
		$temp = array();
		while ($line = mysql_fetch_array($rows, MYSQL_ASSOC)) {
			$temp[]= $line;
		}
		return $temp;
	}

	public static function __table_describe($table_name) {
		$columns_name = array();
		$rows = mysql_query('DESCRIBE '.$table_name);
		while ($line = mysql_fetch_array($rows, MYSQL_ASSOC)) {
			$columns_name[]= $line['Field'];
		}
		return $columns_name;
	}




	private static $flag_connect = false;

	protected static function connect() {
		if(self::$flag_connect) return;
		self::$flag_connect = true;

		$link_connect = mysql_connect(self::$config['host'], self::$config['user_name'], self::$config['password']) or die('Не удалось соединиться: ' . mysql_error());
		mysql_select_db(self::$config['db_name']) or die('Не удалось выбрать базу данных');
		return $link_connect;
	}

	protected static function close($connect){
		if(!$connect)	return;

		mysql_close($connect);

		self::$flag_connect = false;
	}
}

 ?>