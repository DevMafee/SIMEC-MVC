<?php

class About extends BaseController
{
	public function __construct(){
		parent::__construct();
		// Auth::check();
	}
	public function index()
	{
		$this->view->load('about/index');
	}

	public function about()
	{
		$this->view->load('about/about');
	}
}