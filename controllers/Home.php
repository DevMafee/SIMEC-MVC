<?php

class Home extends BaseController
{
	public function __construct(){
		parent::__construct();
		// Auth::check();
	}
	public function index()
	{
		$this->view->load('home/main');
	}

	public function about()
	{
		$this->view->data = "I AM SALMAN";
		$this->view->load('home/main2');
	}
}