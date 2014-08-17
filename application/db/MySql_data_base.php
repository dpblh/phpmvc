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
		return self::convert_all(mysql_query('select * from '.$table_name));
	}

	public static function __findById($id, $table_name, $primary_key) {
		return self::convert_one(mysql_query('select * from '.$table_name.' where '.$primary_key.' = '.mysql_real_escape_string($id)));
	}

	public static function __save($list_params, $table_name) {
		$keys_sql = array();
		$values_sql = array();
		foreach ($list_params as $key => $value) {
			$keys_sql[]= $key;
			$values_sql[]= '"'.mysql_real_escape_string($value).'"';
		}
		return mysql_query('insert into '.$table_name.' ('.implode(', ', $keys_sql).') values ('.implode(', ', $values_sql).')');
	}

	public static function __update($list_params, $table_name, $primary_key) {
		$update_values = array();
		$id = $list_params['id'];
		unset($list_params['id']);
		foreach ($list_params as $key => $value) {
			$update_values[]= $key.'='.'"'.mysql_real_escape_string($value).'"';
		}
		mysql_query('update '.$table_name.' set '.implode(', ', $update_values).' where '.$primary_key.' = '.$id) or die('Обнавление не удалось: ' . mysql_error());
		return $list_params;
	}

	public static function __delete($id, $table_name, $primary_key) {
		return mysql_query('delete from '.$table_name.' where '.$primary_key.'='.mysql_real_escape_string($id));
	}

	public static function __select_all($query) {
		return self::convert_all(mysql_query($query));
	}

	public static function __select_one($query) {
		return self::convert_one(mysql_query($query));
	}

	public static function __count($table_name) {
		$row = mysql_query('select count(*) from '.$table_name);	
		$row = mysql_fetch_array($row);
		return $row[0];
	}

	public static function __paging($page, $limit, $table_name) {
		$all = self::count($table_name);
		$result = self::select_all('select * from '.$table_name.' limit '.($page-1)*$limit.','.$limit);
		return array('current_page'=>$page, 'all_page'=>$all/$limit, 'limit'=>$limit, 'items'=>$result);
	}

	public static function __findBy($hash, $table_name, $like_modify = false, $or_modify = false) {
		$logic = 'and';
		$equal = '=';
		if($or_modify)	$logic = 'or';
		if($like_modify)	$equal = 'like';	
		foreach ($hash as $key => $value) {
			$where_values[]= $key.' '.$equal.' '.'"'.mysql_real_escape_string($value).'"';
		}
		$rows = mysql_query('select * from '.$table_name.' where '.implode(' '.$logic.' ', $where_values)) or die('Запрос не удался: ' . mysql_error());
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

	private static function convert_all($rows) {
		$temp = array();
		while ($line = mysql_fetch_array($rows, MYSQL_ASSOC)) {
			$temp[]= $line;
		}
		return $temp;
	}

	private static function convert_one($row) {
		$row = mysql_fetch_array($row);
		return $row;
	}
}

 ?>