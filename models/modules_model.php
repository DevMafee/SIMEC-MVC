<?php
/**
 * Modules Model
 */
class Modules_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function saveData(){
		//Session::init();
		if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']) {
			if ( $_POST['modules_name'] != '' && $_POST['modules_rank'] != '' ) {
				$stmt = $this->db->prepare("INSERT INTO `modules`(`modules_name`, `modules_rank`) VALUES ('$_POST[modules_name]','$_POST[modules_rank]')");
				$stmt->execute();
				$_SESSION['module']=$_POST['modules_name'];
				return 'SUCCESS';
			}elseif( $_POST['modules_name'] == '' &&  $_POST['modules_rank'] == '' ){
				$_SESSION['modules_name']="Module Name Can not Empty";
				$_SESSION['modules_rank']="Module Rank Can not Empty";
				return 'FAILED';
			}elseif( $_POST['modules_name'] == '' ){
				$_SESSION['modules_name']="Module Name Can not Empty!";
				return 'FAILED';
			}elseif( $_POST['modules_rank'] == '' ){
				$_SESSION['modules_rank']="Module Rank Can not Empty!";
				return 'FAILED';
			}else{
				$_SESSION['modules_error']="Something Went Wrong!";
				return 'FAILED';
			}
		}else{
			$_SESSION['modules_error']="Something Went Wrong!";
			return 'FAILED';
		}
	}

	public function fetchData(){
		$stmt = $this->db->prepare("SELECT * FROM `modules` ORDER BY `modules_id` DESC");
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}

	public function create($query){
		$stmt = $this->db->prepare($query);
		if ( $stmt->execute() ) {
			return 'SUCCESS';
		}else{
			return 'FAILED';
		}
	}

}