<?php 

/**
* 
*/
class Controller_index extends Controller
{
	
	function __construct()
	{
		# code...
	}

	public function index() {
		$model = new Model_index();
		$view = new View();
		$view->render('index', $model->getName());
	}
}

?>