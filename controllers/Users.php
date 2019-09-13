<?php
// Users Controller
class Users extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		Auth::check();
	}

	function all(){
		$this->view->data = $this->model->fetch('users');
		$this->view->admin('users/index');
	}

	function create(){
		$this->view->admin('users/create');
	}

	function save(){
		$data = $this->model->save();
		if ( $data == 'SUCCESS' ) {
			$this->redirect('all');
		}else{
			$this->redirect('create');
		}
	}

	function update(){
		$data = $this->model->update();

		if ( $data == 'SUCCESS' ) {
			$this->redirect('all');
		}else{
			$this->redirect('all');
		}
	}

	function delete(){
		$data = $this->model->delete();

		if ( $data == 'SUCCESS' ) {
			$this->redirect('all');
		}else{
			$this->redirect('all');
		}
	}
}