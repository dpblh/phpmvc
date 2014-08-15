<?php 
namespace core;


use config\Config as Config;
use lib\NotFoundException as NotFoundException;

/**
* 
*/
class Model
{

	function __construct()
	{
		# code...
	}

	public static $data_base;

	protected static $table_name;

	public static function findAll() {
		$db = self::$data_base;
		return $db::findAll(self::getClassName());
	}

	public static function findById($id) {
		$db = self::$data_base;
		$result = $db::findById($id, self::getClassName()) or self::thrown();
		return $result;
	}

	public static function save($model) {
		$params = self::filter_attribute($model);
		$db = self::$data_base;
		$result = $db::save($params, self::getClassName()) or self::thrown();
		return $result;
	}

	public static function update($model) {
		$params = self::filter_attribute($model);
		$db = self::$data_base;
		$result = $db::update($params, self::getClassName()) or self::thrown();
		return $result;
	}

	public static function delete($model) {
		$db = self::$data_base;
		return $db::delete($model['id'], self::getClassName());
	}

	public static function select_all($query) {
		$db = self::$data_base;
		return $db::select_all($query) or self::thrown();
	}

	public static function getClassName() {
		$current_class = get_called_class();
		return isset($current_class::$table_name) ? $current_class::$table_name : strtolower(substr(strrchr(get_called_class(), "\\"), 1));
    }


	//private block

	protected static function thrown(){
		throw new NotFoundException();
	}

	private static $models_attribute = array();

	public static function model_attribute() {
		$model_name = self::getClassName();
		if(!isset(self::$models_attribute[$model_name])) {
			$db = self::$data_base;
			self::$models_attribute[$model_name] = $db::table_describe($model_name);
		}
		print_r(self::$models_attribute[$model_name]);
		return self::$models_attribute[$model_name];
	}

	public static function filter_attribute($params) {
		$filtred_params = array();
		foreach (self::model_attribute() as $key => $value) {
			if(isset($params[$value]) && strlen($params[$value]) != 0) $filtred_params[$value] = $params[$value];
		}
		return $filtred_params;
	}

	public static function __callStatic($method, $arguments) {
		if(strrpos($method, 'findBy') == 0){
			$column_name = substr($method, 6);
			$db = self::$data_base;
			$result = $db::findBy($column_name, $arguments[0], self::getClassName());
			return $result;
		}
    }


}

?>