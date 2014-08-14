<?php 
namespace core
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
		if(is_array($view_name)){
			$view_name = $view_name['controller'].'/'.$view_name['action'];
		}
		include APP_PATH.'/application/views/Template.php';
	}
}

?>