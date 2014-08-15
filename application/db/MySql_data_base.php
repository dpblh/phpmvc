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
		$roWS = mysql_query('select * from '.$table_name) or die('Запрос не удался: ' . mysql_error());
		$temp = array();
		while ($line = mysql_fetch_array($rows, MYSQL_ASSOC)) {
			$temp[]= $line;
		}
		return $temp;
	}

	public static function __findById($id, $table_name) {
		return mysql_fetch_array(mysql_query('select * from '.$table_name.' where id = '.mysql_real_escape_string($id)) or die('Запрос не удался: ' . mysql_error()), MYSQL_ASSOC);
	}

	public static function __save($list_params, $table_name) {
		$keys_sql = array();
		$values_sql = array();
		foreach ($list_params as $key => $value) {
			$keys_sql[]= $key;
			$values_sql[]= '"'.mysql_real_escape_string($value).'"';
		}
		mysql_query('insert into '.$table_name.' ('.implode(', ', $keys_sql).') values ('.implode(', ', $values_sql).')') or die('Вставка не удалась: ' . mysql_error());
	}

	public static function __update($list_params, $table_name) {
		$update_values = array();
		$id = $list_params['id'];
		foreach ($params as $key => $value) {
			$update_values[]= $key.'='.'"'.mysql_real_escape_string($value).'"';
		}
		mysql_query('update '.$table_name.' set '.implode(', ', $update_values).' where id = '.$id) or die('Обнавление не удалось: ' . mysql_error());
	}

	public static function __delete($id, $table_name) {
		mysql_query('delete from '.$table_name.' where id='.mysql_real_escape_string($id)) or die('Удаление не удалось: ' . mysql_error());
	}

	public static function __select_all($query) {
		$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
	}

	public static function __table_describe($table_name) {
		$columns_name = array();
		$db_table_describe = mysql_query('DESCRIBE '.$table_name);
			foreach ($db_table_describe as $key => $value) {
				$columns_name[]= $value['Field'];
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
		if(!$link_connect)	return;

		mysql_close($link_connect);

		self::$flag_connect = false;
	}
}

 ?>