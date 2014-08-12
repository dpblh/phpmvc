<?php 

/**
* 
*/
class View
{
	
	function __construct()
	{
		# code...
	}

	public function render($view_name, $data = array()) {
		include APP_PATH.'/application/views/Template.php';
	}
}

?>