<?php
//Modules Coltroller
class Modules extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		Auth::check();
	}

	function create(){
		$this->view->admin('modules/create');
	}

	function save(){
		$data = $this->model->saveData();
		if ( $data == 'SUCCESS' ) {
			$this->createTable($_SESSION['module']);
			$this->redirect('all');
		}else{
			$this->redirect('create');
		}
	}

	function all(){
		$this->view->data = $this->model->fetchData();
		$this->view->admin('modules/view');
	}
}