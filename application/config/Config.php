<?php 
namespace config;

/**
* 
*/

class Config
{
	
	function __construct()
	{
		# code...
	}

	public static function data() {
		return array(
			// db config
			"db" => array(

				"db_provider" => 'db\MySql_data_base',
				"host" => "localhost",
				"port" => "",
				"user_name" => "root",
				"password" => "timcykahax",
				"db_name" => "test"

			)

		);
	}
}

 ?>