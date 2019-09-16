<main class="app-main">
    <div class="wrapper">
      <div class="page">
        <div class="page-inner">
          <div class="page-section">
            <br>
            <div class="row">
              <div class="col-12 col-lg-12 col-xl-12">
                <div class="card card-fluid">
                  <div class="card-body">
                    <?php if(isset($_SESSION['modules_error'])){ echo $_SESSION['modules_error']?'<div id="hideMe" class="alert alert-warning alert-dismissible fade show" role="alert">'.$_SESSION['modules_error'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>':''; $_SESSION['modules_error']='';} ?>
                    <form action="<?php echo url('modules/save'); ?>" method="post">
                      <?php $_SESSION['csrf_token']=md5(rand()); ?>
                      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                      <fieldset>
                        <legend>Create New Module</legend>
                        <div class="form-group">
                          <label for="modules_name">Module Name</label>
                          <div class="has-clearable">
                            <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                            <input type="text" class="form-control" id="modules_name" name="modules_name" placeholder="Type something...">
                          </div>
                          <small class="form-text text-danger"><?php echo isset( $_SESSION['modules_name'] )?$_SESSION['modules_name']:''; $_SESSION['modules_name'] = "";?></small>
                        </div>
                        <div class="form-group">
                          <label for="modules_rank">Module Rank</label>
                          <div class="custom-number">
                            <input type="number" class="form-control" id="modules_rank" name="modules_rank" placeholder="Rank of Module Show in Left Sidebar....">
                            <div class="custom-number-controls"><div class="custom-number-btn custom-number-up">+</div><div class="custom-number-btn custom-number-down">-</div></div>
                          </div>
                          <small class="form-text text-danger"><?php echo isset( $_SESSION['modules_rank'] )?$_SESSION['modules_rank']:''; $_SESSION['modules_rank'] = ""; ?></small>
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
</main>