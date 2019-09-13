<?php
//Auth Class
class Auth
{
	
	function __construct()
	{
		parent::__construct();
	}
	public function check(){
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			header('location: '.url('login'));
			exit;
		}
	}

}