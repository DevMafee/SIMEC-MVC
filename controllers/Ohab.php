<?php
//Ohab Controller
class Ohab extends BaseController
{
	public function __construct(){
		parent::__construct();
		Auth::check();
	}
	
	public function index()
	{
		//Some Functionalities
		$this->view->admin('ohab/index');
	}
	
	public function create()
	{
		//Some Functionalities
		$this->view->admin('ohab/create');
	}
	
	public function update()
	{
		//Some Functionalities
	}
	
	public function delete()
	{
		//Some Functionalities
	}
	
	public function retrive()
	{
		//Some Functionalities
	}
}