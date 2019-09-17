<?php
// Users Controller
class Users extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		Auth::check();
	}

	function index(){
		$this->view->data = $this->model->fetch('users');
		$this->view->admin('users/index');
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

	function undodelete(){
		$data = $this->model->undodelete();

		if ( $data == 'SUCCESS' ) {
			$this->redirect('all');
		}else{
			$this->redirect('all');
		}
	}

	function active(){
		$data = $this->model->active();

		if ( $data == 'SUCCESS' ) {
			$this->redirect('all');
		}else{
			$this->redirect('all');
		}
	}
}