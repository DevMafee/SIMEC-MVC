<?php
class BaseController
{
	
	function __construct()
	{
		$this->view = new View();
	}
	public function loadModel($name){
		$file = 'models/'.$name.'_model.php';
		if (file_exists($file)) {
			require 'models/'.$name.'_model.php';
			$modelName = $name.'_Model';
			$this->model = new $modelName();
		}
	}

	public function redirect($where){
		header('location: '.$where);
	}

	public function in_out($id, $compare, $output, $table)
	{
		$stmnt = $this->db->prepare("SELECT `'$output'` FROM `'$table'` WHERE `'$compare'`='$id'");
		$stmt->execute();
		$data = $stmt->fetchAll();
		$data = json_encode($data);
		$data = json_decode($data);
		foreach ($data as $value) {
			return $value->$output;
		}
	}

	public function createTable($table){
		$tbl_create = "CREATE TABLE IF NOT EXISTS `$table` (
		  `$table"."_id` int(11) NOT NULL AUTO_INCREMENT,
		  `$table"."_date` datetime NOT NULL DEFAULT current_timestamp(),
		  PRIMARY KEY (`$table"."_id`)
		)";
		$stmt = $this->model->create($tbl_create);
		if ($stmt === 'SUCCESS') {
			return 'SUCCESS';
		} else {
			return 'FAILED'; 
		}
	}

	public function menu(){
		$stmt = $this->model->fetchmenu();
		print_r($stmt);
		exit;
	}

}