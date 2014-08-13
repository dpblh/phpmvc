<?php 

/**
* 
*/
class Controller
{
	
	function __construct()
	{
		# code...
	}

	public function render($view_name, $data = array()){
		$view = new View();
		$view->render($view_name, $data);
	}

	public function redirect($url) {
		header('Location: /'.$url);
		exit;
	}

	public $params;
	
}

?>