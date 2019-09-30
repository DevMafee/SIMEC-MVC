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
			$this->createTable(strtolower($_SESSION['module_model']));
			$this->createController($_SESSION['module'], $_SESSION['module_model']);
			$this->createModel($_SESSION['module'], $_SESSION['module_model']);
			$this->createView($_SESSION['module_model']);
			$_SESSION['module']='';
			$this->redirect('all');
		}else{
			$this->redirect('create');
		}
	}

	function dalete(){
		$data = $this->model->dalete();
		if ( $data == 'SUCCESS' ) {
			$this->redirect('all');
		}else{
			$this->redirect('all');
		}
	}

	function all(){
		$this->view->data = $this->model->fetchData();
		$this->view->admin('modules/view');
	}
}