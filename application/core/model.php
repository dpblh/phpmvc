<?php 
namespace core;
/**
* 
*/
class Model
{

	function __construct()
	{
		# code...
	}

	public static function findAll() {
		return self::convert_all(self::select_all('select * from person'));
	}

	public static function findById($id) {
		return self::convert_one(self::select_all('select * from person where id = '.$id));
	}

	public static function save($model) {
		$link_connect = self::connect();
		$params = self::filter_attribute($model);
		$keys_sql = array();
		$values_sql = array();
		foreach ($params as $key => $value) {
			$keys_sql[]= $key;
			$values_sql[]= '"'.mysql_real_escape_string($value).'"';
		}
		mysql_query('insert into person ('.implode(', ', $keys_sql).') values ('.implode(', ', $values_sql).')') or die('Вставка не удалась: ' . mysql_error());
		self::close($link_connect);
	}

	public static function update($model) {
		$link_connect = self::connect();
		$params = self::filter_attribute($model);
		$update_values = array();
		$id = $model['id'];
		foreach ($params as $key => $value) {
			$update_values[]= $key.'='.'"'.mysql_real_escape_string($value).'"';
		}
		$result = mysql_query('update person set '.implode(', ', $update_values).' where id = '.$id) or die('Обнавление не удалось: ' . mysql_error());
		self::close($link_connect);
	}

	public static function delete($model) {
		$link_connect = self::connect();
		mysql_query('delete from person where id='.$model['id']) or die('Удаление не удалось: ' . mysql_error());
		self::close($link_connect);
	}

	public static function select_all($query) {
		$link_connect = self::connect();
		$result = mysql_query($query) or die('Запрос не удался: ' . mysql_error());
		self::close($link_connect);
		return $result;
	}

	public static function getClassName() {
		return strtolower(substr(strrchr(get_called_class(), "\\"), 1));
    }


	//private block

	private static $models_attribute = array();

	public static function model_attribute() {
		$model_name = self::getClassName();
		if(!isset(self::$models_attribute[$model_name])) {
			$columns_name = array();
			$db_table_describe = self::convert_all(self::select_all('DESCRIBE person'));
			foreach ($db_table_describe as $key => $value) {
				$columns_name[]= $value['Field'];
			}
			self::$models_attribute[$model_name] = $columns_name;
		}

		return self::$models_attribute[$model_name];
	}

	public static function filter_attribute($params) {
		$filtred_params = array();
		foreach (self::model_attribute() as $key => $value) {
			if(isset($params[$value]) && strlen($params[$value]) != 0) $filtred_params[$value] = $params[$value];
		}
		return $filtred_params;
	}

	private static function convert_one($row) {
		return mysql_fetch_array($row, MYSQL_ASSOC);
	}

	private static function convert_all($row) {
		$temp = array();
		while ($line = mysql_fetch_array($row, MYSQL_ASSOC)) {
			$temp[]= $line;
		}
		return $temp;
	}

	private static $flag_connect = false;

	private static function connect() {
		if(self::$flag_connect) return;
		self::$flag_connect = true;
		$link_connect = mysql_connect('localhost', 'root', 'timcykahax') or die('Не удалось соединиться: ' . mysql_error());
		mysql_select_db('test') or die('Не удалось выбрать базу данных');
		return $link_connect;
	}

	private static function close($link_connect) {
		if(!$link_connect)	return;
		mysql_close($link_connect);
		self::$flag_connect = false;
	}




}

?>