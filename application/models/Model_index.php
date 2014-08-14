<?php 
namespace models;

use core\Model as Model;
/**
* 
*/
class Model_index extends Model
{
	
	function __construct()
	{
		# code...
	}

	public function getName() {
		return "Tim";
	}

	public function getParams() {
		return $_POST['firstName'];
	}
}

?>