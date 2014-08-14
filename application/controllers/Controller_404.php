<?php 
namespace controllers;

use core\Controller as Controller;
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
		$this->render('404/index');
	}
}

 ?>