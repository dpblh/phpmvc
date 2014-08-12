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

	public function one() {
		$model = new Model_index();
		$view = new View();
		$view->render('one', $model->getName());	
	}

	public function create() {
		$model = new Model_index();
		$view = new View();
		$view->render('create', $model->getParams());	
	}
}

?>