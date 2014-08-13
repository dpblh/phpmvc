<?php 

/**
* 
*/
class Controller_404 extends Controller
{
	
	function __construct()
	{
		# code...
	}

	public function index() {
		$view = new View();
		$view->render('404/index');
	}
}

 ?>