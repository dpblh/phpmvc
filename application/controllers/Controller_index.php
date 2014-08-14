<?php 
namespace controller

use models\Model_index as Model;
/**
* 
*/
class Controller_index extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		# code...
	}

	// GET /index
	public function index() {
		$this->render('index/index', Model::findAll());
	}

	// GET /index/1
	public function show() {
		$this->render('index/show', Model::findById($this->params['id']));	
	}

	// POST /index
	public function create() {
		$model = new Model();
		$this->redirect('index');
	}

	// DELETE /index/1
	public function destroy() {
		$this->redirect('index');
	}

	// PUT /index/1
	public function update() {
		$item = Model::update($this->params);
		$this->redirect('index/'.$this->params['id']);
	}

	//GET /index/1/edit
	public function edit() {
		$this->render('index/edit', Model::findById($this->params['id']));
	}

	public function niw() {
		$this->render('index/niw');
	}
}

?>