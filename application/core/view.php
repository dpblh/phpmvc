<?php 
namespace core;
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
		// print 'qqqqqq';
		// print strrpos($view_name, '.js');
		// exit;
		if(strrpos($view_name, '.js')) {
			include APP_PATH.'/application/views/'.$view_name.'.php';
			exit;
		}

		include APP_PATH.'/application/helpers/view_helper.php';
		include APP_PATH.'/application/views/Template.php';
	}
}

?>