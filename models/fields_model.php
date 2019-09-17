<?php
/**
 * Fields Model
 */
class Fields_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function fetchForm(){
		$stmt = $this->db->prepare("SELECT * FROM `modules` WHERE `modules_status`=1 ORDER BY `modules_id` DESC");
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}

	public function saveData(){
		$field_form = $_POST['field_form'];
		$field_name = strtolower(str_replace(' ', '_', $_POST['field_name']));
		$field_label = $_POST['field_label'];
		$field_length = $_POST['field_length'];
		$field_category = $_POST['field_category'];
		$field_data_type = $_POST['field_data_type'];
		$field_required = $_POST['field_required'];
		$field_style = $_POST['field_style'];
		$field_readonly = $_POST['field_readonly'];
		$field_js = $_POST['field_js'];
		$field_value = $_POST['field_value'];
		$field_status = $_POST['field_status'];
		$field_added_by = $_POST['field_added_by'];
		$stmt = $this->db->prepare("INSERT INTO `fields`(`field_form`, `field_name`, `field_label`, `field_length`, `field_category`, `field_data_type`, `field_required`, `field_style`, `field_readonly`, `field_js`, `field_value`, `field_status`, `field_added_by`) VALUES ($field_form, '$field_name', '$field_label', '$field_length', '$field_category', '$field_data_type', '$field_required', '$field_style', '$field_readonly', '$field_js', '$field_value', '$field_status', $field_added_by)");
		if ($stmt->execute()) {
			$_SESSION['fields_error']="Successfully Added!";
			return 'SUCCESS';
		}else{
			return 'FAILED';
		}
	}

	public function fetchData(){
		$stmt = $this->db->prepare("SELECT * FROM `fields` ORDER BY `field_id` DESC");
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

	public function dalete(){
		if ($_POST['modules_status'] == 1) {
			$status = 0;
		}else{
			$status = 1;
		}
		$query = "UPDATE `modules` SET `modules_status`=".$status." WHERE `modules_id`=".$_POST['modules_id'];
		$stmt = $this->db->prepare($query);
		if ( $stmt->execute() ) {
			return 'SUCCESS';
		}else{
			return 'FAILED';
		}
	}

}