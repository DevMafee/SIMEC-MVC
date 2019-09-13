<?php
//Login Controller
class Login extends BaseController
{
	
	public function __construct(){
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == true) {
			$this->redirect("../dashboard");
			exit;
		}
	}
	public function index()
	{
		$this->view->load('login/login');
	}

	public function run()
	{
		$data = $this->model->login('users', 'username', 'password');
		if ( $data == 'SUCCESS') {
			$this->redirect("../dashboard");
		}else{
			$this->redirect("../login");
		}
	}

}