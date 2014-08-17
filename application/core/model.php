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

	protected static $primary_key;

	public static function findAll() {
		$db = self::$data_base;
		return $db::findAll(self::getClassName());
	}

	public static function findById($id) {
		$db = self::$data_base;
		$result = $db::findById($id, self::getClassName(), self::getPrimaryKey()) or self::thrown();
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
		$result = $db::update($params, self::getClassName(), self::getPrimaryKey()) or self::thrown();
		return $result;
	}

	public static function delete($model) {
		$db = self::$data_base;
		return $db::delete($model['id'], self::getClassName(), self::getPrimaryKey());
	}

	public static function select_all($query) {
		$db = self::$data_base;
		return $db::select_all($query);
	}

	public static function select_one($query) {
		$db = self::$data_base;
		return $db::select_one($query);	
	}

	public static function count() {
		$db = self::$data_base;
		return $db::count(self::getClassName());	
	}

	public static function paging($page, $limit) {
		$db = self::$data_base;
		return $db::paging($page, $limit, self::getClassName());
	}

	public static function getClassName() {
		$current_class = get_called_class();
		return isset($current_class::$table_name) ? $current_class::$table_name : strtolower(substr(strrchr(get_called_class(), "\\"), 1));
    }

    public static function getPrimaryKey() {
    	$current_class = get_called_class();
		return isset($current_class::$primary_key) ? $current_class::$primary_key : 'id';
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
		if(isset($params['id']))	$filtred_params['id'] = $params['id'];
		return $filtred_params;
	}

	public static function __callStatic($method, $arguments) {
		if($method == 'findBy'){
			array_splice($arguments, 1, 0, self::getClassName());
			$db = self::$data_base;
			$result = call_user_func_array("$db::findBy", $arguments);
			return $result;
		}
		else if(strrpos($method, 'findBy') == 0){
			$like_modify = false;
			if(isset($arguments[1]))	$like_modify = true;
			$column_name = substr($method, 6);
			$db = self::$data_base;
			$result = $db::findBy(array($column_name => $arguments[0]), self::getClassName(), $like_modify);
			return $result;
		}
    }


}

?>