<?php 
namespace controllers;

use models\customer_contact as customer_contact;
use core\Controller as Controller;
/**
* 
*/
class Controller_customer_contact extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		# code...
	}

	// GET /index
	public function index() {
		$limit = isset($this->params['limit']) ? $this->params['limit'] : 10;
		$page = isset($this->params['page']) ? $this->params['page'] : 1;
		$this->render('customer_contact/index', Customer_contact::paging($page, $limit));
	}

	// GET /index/1
	public function show() {
		$this->render('customer_contact/show', Customer_contact::findById($this->params['id']));
	}

	// POST /index
	public function create() {
		Customer_contact::save($this->params);
		$this->redirect('customer_contact');
	}

	// DELETE /index/1
	public function destroy() {
		Customer_contact::delete($this->params);
		$this->redirect('customer_contact');
	}

	// PUT /index/1
	public function update() {
		$item = Customer_contact::update($this->params);
		$this->redirect('customer_contact/'.$this->params['id']);
	}

	//GET /index/1/edit
	public function edit() {
		$this->render('customer_contact/edit', Customer_contact::findById($this->params['id']));
	}

	public function niw() {
		$this->render('customer_contact/niw');
	}

	public function highcharts() {
		$data = Customer_contact::user_count_record();
		$arr = array();
		foreach ($data as $key => $value) {
			$arr[]= array($value['user_id'], $value['count']+0.0);
		}
		$this->render('customer_contact/highcharts.js', $arr);
	}
}

?>