<?php 
namespace core
/**
* 
*/
class Model
{

	private static $_db = array(
			1 => array(
				'firstName' => 'tim',
				'lastName' => 'bay',
				'id' => 1
			),
			2 => array(
				'firstName' => '2tim',
				'lastName' => '2bay',
				'id' => 2
			),
			3 => array(
				'firstName' => '3tim',
				'lastName' => '3bay',
				'id' => 3
			)
		);
	
	function __construct()
	{
		# code...
	}

	public static function findAll() {
		return self::$_db;
	}

	public static function findById($id) {
		return self::$_db[$id];
	}

	public static function save($model) {
		$id = count(self::$_db);
		$model['id'] = $id;
		self::$_db[$id] = $model;
	}

	public static function update($model) {
		self::$_db[$model['id']] = $model;
	}

	public static function delete($model) {
		self::$_db[$model['id']] = null;
	}

}

?>