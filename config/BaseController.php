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
		  `$table"."_status` int(2) NOT NULL DEFAULT 1,
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

	public function createController($table, $model_name){
		$file = fopen("controllers/".$table.".php", "w") or die("Unable to open file!");
		$content = "<?php
//".$table." Controller
class ".$table." extends BaseController
{
	public function __construct(){
		parent::__construct();
		Auth::check();
	}
	
	public function index()
	{
		\$this->view->data = \$this->model->fetchData(".$model_name.");
		\$this->view->admin('".$model_name."/index');
	}

	public function all()
	{
		\$this->view->data = \$this->model->fetchData(".$model_name.");
		\$this->view->admin('".$model_name."/index');
	}
	
	public function create()
	{
		\$this->view->admin('".$model_name."/create');
	}
	
	public function save()
	{
		\$data = \$this->model->save('".$model_name."');
		if ( \$data == 'SUCCESS' ) {
			\$this->redirect('all');
		}else{
			\$this->redirect('create');
		}
	}
	
	function update(){
		\$data = \$this->model->update('".$model_name."');

		if ( \$data == 'SUCCESS' ) {
			\$this->redirect('all');
		}else{
			\$this->redirect('all');
		}
	}
	
	function dalete(){
		\$data = \$this->model->dalete('".$model_name."');
		if ( \$data == 'SUCCESS' ) {
			\$this->redirect('all');
		}else{
			\$this->redirect('all');
		}
	}
	function undodelete(){
		\$data = \$this->model->undodelete('".$model_name."');

		if ( \$data == 'SUCCESS' ) {
			\$this->redirect('all');
		}else{
			\$this->redirect('all');
		}
	}

	function active(){
		\$data = \$this->model->active('".$model_name."');

		if ( \$data == 'SUCCESS' ) {
			\$this->redirect('all');
		}else{
			\$this->redirect('all');
		}
	}

}";
		fwrite($file, $content);
		fclose($file);
		$file_location = "controllers/".$table.".php";

		if (file_exists($file_location)) {
			return 'SUCCESS';
		} else {
			return 'FAILED'; 
		}
	}

	public function createModel($table,$model_name){
		$file = fopen("models/".$model_name."_model.php", "w") or die("Unable to open file!");
		$content = "<?php
//".$table." Models
class ".$table."_Model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	public function findformID(\$table){
		\$stmt = \$this->db->prepare(\"SELECT `modules_id` FROM `modules` WHERE `modules_table`='$model_name'\");
		\$stmt->execute();
		\$data = \$stmt->fetchAll();
		return \$data;
	}
	public function save(\$table)
	{
		\$fields = '';
		\$formId = \$this->model->findformID($table);
		\$sql = 
		\$fields .= '``';
		\$stmt = \$this->db->prepare(\"INSERT INTO `".$model_name."`(  ) VALUES (  )\");
		if ( \$stmt->execute() === TRUE ) {
			return 'SUCCESS';
		}else{
			return 'FAILED';
		}
	}
	
}";
		fwrite($file, $content);
		fclose($file);
		$file_location = "controllers/".$model_name.".php";

		if (file_exists($file_location)) {
			return 'SUCCESS';
		} else {
			return 'FAILED'; 
		}
	}

	public function createView($view_folder){
		$folder = mkdir("views/".$view_folder) or die("Unable to Create Folder!");

		$file = fopen("views/".$view_folder."/index.php", "w") or die("Unable to open file!");
		$file2 = fopen("views/".$view_folder."/create.php", "w") or die("Unable to open file!");
		$content = '<main class="app-main">
  <div class="wrapper">
    <div class="page">
      <div class="page-inner">
        <div class="page-section">
          <div class="row mt-3">
            <div class="col-12 col-lg-12 col-xl-12">
              <div class="card card-fluid">
                <h6 class="card-header"> '.$view_folder.' File Created </h6>
                <div class="card-body">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>';

		$content2 = '<main class="app-main">
  <div class="wrapper">
    <div class="page">
      <div class="page-inner">
        <div class="page-section">
          <div class="row mt-3">
            <div class="col-12 col-lg-12 col-xl-12">
              <div class="card card-fluid">
                <h6 class="card-header"> '.$view_folder.' File Created </h6>
                <div class="card-body">
                	<form action="<?php echo url(\''.$view_folder.'/save\'); ?>" method="post">
                      <?php $_SESSION[\'csrf_token\']=md5(rand()); ?>
                      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION[\'csrf_token\']; ?>">
                      <fieldset>
                        <legend>Create New '.$view_folder.'</legend>
                        <div class="form-group">
                          <label for="'.$view_folder.'_name">'.$view_folder.' Name</label>
                          <div class="has-clearable">
                            <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                            <input type="text" class="form-control" id="'.$view_folder.'_name" name="'.$view_folder.'_name" placeholder="Type something...">
                          </div>
                          <small class="form-text text-danger"><?php echo isset( $_SESSION[\''.$view_folder.'_name\'] )?$_SESSION[\''.$view_folder.'_name\']:\'\'; $_SESSION[\''.$view_folder.'_name\'] = "";?></small>
                        </div>
                        <div class="form-actions">
                          <button class="btn btn-primary mx-2" type="submit">Submit form</button>
                          <button class="btn btn-warning mx-2" type="reset">Reset</button>
                        </div>
                      </fieldset>
                    </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>';
		fwrite($file, $content);
		fwrite($file2, $content2);
		fclose($file);
		fclose($file2);
		$file_location = "views/".$view_folder."/index.php";
		$file_location2 = "views/".$view_folder."/create.php";
		if (file_exists($file_location) && file_exists($file_location2)) {
			return 'SUCCESS';
		} else {
			return 'FAILED'; 
		}
	}

	// public function menu(){
	// 	$stmt = $this->model->fetchmenu();
	// 	print_r($stmt);
	// 	exit;
	// }

}