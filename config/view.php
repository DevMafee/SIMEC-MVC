<?php
//View Class For Common View
class View
{
	
	function __construct()
	{
		// $this->view = new View();
		// echo "SALMAN FROM VIEW";
	}

	function load($file, $data=[]){
		require 'views/layout/header.php';
		require 'views/layout/navbar.php';
		require 'views/'.$file.'.php';
		require 'views/layout/footer.php';
	}

	function admin($file, $data=[]){
		require 'views/layout/admin/header.php';
		require 'views/layout/admin/topbar.php';
		require 'views/layout/admin/sidebar.php';
		require 'views/'.$file.'.php';
		require 'views/layout/admin/footer.php';
	}
}