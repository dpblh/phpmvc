<?php 
namespace controllers;

use models\Person as Person;
use core\Controller as Controller;
/**
* 
*/
class Controller_person extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		# code...
	}

	// GET /index
	public function index() {
		$this->render('person/index', Person::findAll());
	}

	// GET /index/1
	public function show() {
		$this->render('person/show', Person::findById($this->params['id']));
	}

	// POST /index
	public function create() {
		Person::save($this->params);
		$this->redirect('person');
	}

	// DELETE /index/1
	public function destroy() {
		Person::delete($this->params);
		$this->redirect('person');
	}

	// PUT /index/1
	public function update() {
		$item = Person::update($this->params);
		$this->redirect('person/'.$this->params['id']);
	}

	//GET /index/1/edit
	public function edit() {
		$this->render('person/edit', Person::findById($this->params['id']));
	}

	public function niw() {
		$this->render('person/niw');
	}
}

?>