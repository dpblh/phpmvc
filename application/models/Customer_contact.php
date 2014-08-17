<?php 
namespace models;

use core\Model as Model;
/**
* 
*/
class Customer_contact extends Model
{
	// protected static $table_name = 'person';
	protected static $primary_key = 'customer_contact_id';
	
	function __construct()
	{
		# code...
	}

	public static function user_count_record() {
		$db = self::$data_base;
		return $db::select_all('select user_id, count(user_id) as \'count\' from customer_contact group by user_id order by count(user_id)');
	}

}

?>