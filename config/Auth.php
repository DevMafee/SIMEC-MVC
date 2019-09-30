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
		if (Session::get('loggedIn') == false) {
			header('location: '.url('login'));
		}
	}

}