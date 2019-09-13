<?php
// Dashboard Controller
class Dashboard extends BaseController
{
	
	function __construct()
	{
		parent::__construct();
		Auth::check();
	}

	function index(){
		$this->view->photo = $this->model->findProfilephoto('users', 'user_id', $_SESSION['user_id'], 'user_photo');
		$this->view->admin('admin/dashboard');
	}

	function changepassword($id){
		$this->view->photo = $this->model->findProfilephoto('users', 'user_id', $_SESSION['user_id'], 'user_photo');
		$this->view->data = $this->model->findProfile('users', 'user_id_md5', $id);
		$this->view->admin('admin/changepassword');
	}

	function profile($id){
		$this->view->photo = $this->model->findProfilephoto('users', 'user_id', $_SESSION['user_id'], 'user_photo');
		$this->view->data = $this->model->findProfile('users', 'user_id_md5', $id);
		$this->view->admin('admin/profile');
	}
}