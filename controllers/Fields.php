<?php
//Fields Coltroller
class Fields extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		Auth::check();
	}

	function create(){
		$this->view->data = $this->model->fetchForm();
		$this->view->admin('fields/create');
	}

	function save(){
		$data = $this->model->saveData();
		if ( $data == 'SUCCESS' ) {
			// $this->createTable(strtolower($_SESSION['module_model']));
			// $this->createController($_SESSION['module'], $_SESSION['module_model']);
			// $this->createModel($_SESSION['module'], $_SESSION['module_model']);
			// $this->createView($_SESSION['module_model']);
			// $_SESSION['module']='';
			$this->redirect('find');
		}else{
			$this->redirect('create');
		}
	}

	function dalete(){
		$data = $this->model->dalete();
		if ( $data == 'SUCCESS' ) {
			$this->redirect('find');
		}else{
			$this->redirect('find');
		}
	}

	function find(){
		// print_r($this->model->fetchData()); exit;
		$this->view->data = $this->model->fetchData();
		$this->view->admin('fields/view');
	}
}