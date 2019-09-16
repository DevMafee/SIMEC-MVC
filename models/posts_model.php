<?php
//Posts Model
class Posts_Model extends Model
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
		if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']) {
			if ( $_POST['full_name'] != '' && $_POST['username'] != '' && $_POST['password'] != '' ) {
				$stmt = $this->db->prepare("INSERT INTO `users`( `full_name`, `username`, `password`, `user_type`, `user_status`) VALUES ('$_POST[full_name]','$_POST[username]','$_POST[password]','$_POST[user_type]',0)");
				if ( $stmt->execute() === TRUE ) {
					$user_id = $this->db->lastInsertId();
					$user_id_md5 = md5($user_id);
					$upstmt = $this->db->prepare("UPDATE `users` SET `user_id_md5`='$user_id_md5' WHERE `user_id`=$user_id");
					if ($upstmt->execute() === TRUE) {
						return 'SUCCESS';
					}else{
						$upstmt = $this->db->prepare("DELETE * FROM `users` WHERE `user_id`=$user_id");
						return 'FAILED';
					}
				}else{
					return 'FAILED';
				}				
			}elseif( $_POST['full_name'] == '' &&  $_POST['username'] == '' &&  $_POST['password'] == '' ){
				$_SESSION['full_name']="Full Name Can not Empty";
				$_SESSION['username']="User Name Can not Empty";
				$_SESSION['password']="Password Can not Empty";
				return 'FAILED';
			}elseif( $_POST['full_name'] == '' &&  $_POST['username'] == '' ){
				$_SESSION['full_name']="Full Name Can not Empty";
				$_SESSION['username']="User Name Can not Empty";
				return 'FAILED';
			}elseif( $_POST['username'] == '' &&  $_POST['password'] == '' ){
				$_SESSION['username']="User Name Can not Empty";
				$_SESSION['password']="Password Can not Empty";
				return 'FAILED';
			}elseif( $_POST['full_name'] == '' &&  $_POST['password'] == '' ){
				$_SESSION['full_name']="Full Name Can not Empty";
				$_SESSION['password']="Password Can not Empty";
				return 'FAILED';
			}elseif( $_POST['username'] == '' ){
				$_SESSION['username']="User Name Can not Empty!";
				return 'FAILED';
			}elseif( $_POST['full_name'] == '' ){
				$_SESSION['full_name']="Full Name Can not Empty!";
				return 'FAILED';
			}elseif( $_POST['password'] == '' ){
				$_SESSION['password']="Password Can not Empty!";
				return 'FAILED';
			}else{
				return 'FAILED';
			}
		}else{
			return 'FAILED';
		}
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