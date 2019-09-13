<?php
//Login Model
class Login_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function login($table, $un_field, $up_field){
		if (isset($_SESSION['csrf_token']) && $_SESSION['csrf_token'] == $_POST['csrf_token']) {
			$stmt = $this->db->prepare("SELECT * FROM `$table` WHERE `$un_field`=:username AND `$up_field`=:password");

			$stmt->execute(array(
				':username'	=>	$_POST['username'],
				':password'	=>	md5($_POST['password'])
			));
			$data = $stmt->fetchAll();
			
			$count = $stmt->rowCount();
			if ($count > 0) {
				Session::init();
				Session::set('loggedIn', true);
				$data = json_encode($data);
				$data = json_decode($data);
				foreach ($data as $user) {
					Session::set('user_id', $user->user_id);
					Session::set('fullname', $user->full_name);
					Session::set('user_type', $user->user_type);
					Session::set('user_photo', $user->user_photo);
				}
				return 'SUCCESS';
			}else{
				return 'FAILRD';
			}
		}
	}
}