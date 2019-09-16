<?php
//Category Model
class Category_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function fetch_last_id(){
		$stmt = $this->db->prepare("SELECT * FROM `users` ORDER BY `user_id` DESC LIMIT 0,1");
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}

	function save(){
		if ( $_POST['category_name'] != '' ) {
			$stmt = $this->db->prepare("INSERT INTO `categories`( `category_name`, `category_status`) VALUES ('$_POST[category_name]','$_POST[category_status]')");
			if ( $stmt->execute() === TRUE ) {
				$_SESSION['insertion_success']="Category Successfully Inserted!";
				return 'SUCCESS';
			}else{
				$_SESSION['insertion_problem']="Category Insertion Problem!";
				return 'FAILED';
			}				
		}else{
			$_SESSION['category_name']="Category Name Can not Empty!";
			return 'FAILED';
		}
		// if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']) {
		// 	if ( $_POST['category_name'] != '' ) {
		// 		$stmt = $this->db->prepare("INSERT INTO `categories`( `category_name`, `category_status`) VALUES ('$_POST[category_name]','$_POST[category_status]')");
		// 		if ( $stmt->execute() === TRUE ) {
		// 			return 'SUCCESS';
		// 		}else{
		// 			return 'FAILED1';
		// 		}				
		// 	}else{
		// 		$_SESSION['category_name']="Category Name Can not Empty!";
		// 		return 'FAILED2';
		// 	}
		// }else{
		// 	return 'FAILED3';
		// }
	}


	function update(){
		$user_id_md5 = $_POST['user_id'];
		if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token'.$user_id_md5]) {
			if ( $_POST['full_name'] != '' && $_POST['username'] != '' && $_POST['user_type'] != '' ) {
				$upstmt = $this->db->prepare("UPDATE `users` SET `full_name`='".$_POST['full_name']."', `username`='".$_POST['username']."', `user_type`='".$_POST['user_type']."' WHERE `user_id_md5`='$user_id_md5'");
				if ( $upstmt->execute() === TRUE ) {
					return 'SUCCESS';
				}else{
					return 'FAILED01';
				}				
			}elseif( $_POST['full_name'] == '' &&  $_POST['username'] == '' ){
				$_SESSION['full_name']="Full Name Can not Empty";
				$_SESSION['username']="User Name Can not Empty";
				return 'FA ILED';
			}elseif( $_POST['full_name'] == '' ){
				$_SESSION['full_name']="Full Name Can not Empty";
				return 'FAI LED';
			}elseif( $_POST['username'] == '' ){
				$_SESSION['username']="User Name Can not Empty";
				return 'FAIL ED';
			}else{
				return 'FAILE D';
			}
		}else{
			return 'FAILED';
		}
	}

	function delete(){
		$user_id_md5 = $_POST['user_id'];
		if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token'.$user_id_md5]) {
			$upstmt = $this->db->prepare("UPDATE `users` SET `user_status`='3' WHERE `user_id_md5`='$user_id_md5'");
			if ( $upstmt->execute() === TRUE ) {
				return 'SUCCESS';
			}else{
				return 'FAILED';
			}
		}else{
			return 'FAILED';
		}
	}

	function undodelete(){
		$user_id_md5 = $_POST['user_id'];
		if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token'.$user_id_md5]) {
			$upstmt = $this->db->prepare("UPDATE `users` SET `user_status`='0' WHERE `user_id_md5`='$user_id_md5'");
			if ( $upstmt->execute() === TRUE ) {
				return 'SUCCESS';
			}else{
				return 'FAILED';
			}
		}else{
			return 'FAILED';
		}
	}

	function active(){
		$user_id_md5 = $_POST['user_id'];
		if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token'.$user_id_md5]) {
			$upstmt = $this->db->prepare("UPDATE `users` SET `user_status`='1' WHERE `user_id_md5`='$user_id_md5'");
			if ( $upstmt->execute() === TRUE ) {
				return 'SUCCESS';
			}else{
				return 'FAILED';
			}
		}else{
			return 'FAILED';
		}
	}

}