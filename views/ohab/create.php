<main class="app-main">
  <div class="wrapper">
    <div class="page">
      <div class="page-inner">
        <div class="page-section">
          <div class="row mt-3">
            <div class="col-12 col-lg-12 col-xl-12">
              <div class="card card-fluid">
                <h6 class="card-header"> ohab File Created </h6>
                <div class="card-body">
                	<form action="<?php echo url('ohab/save'); ?>" method="post">
                      <?php $_SESSION['csrf_token']=md5(rand()); ?>
                      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                      <fieldset>
                        <legend>Create New ohab</legend>
                        <div class="form-group">
                          <label for="ohab_name">ohab Name</label>
                          <div class="has-clearable">
                            <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                            <input type="text" class="form-control" id="ohab_name" name="ohab_name" placeholder="Type something...">
                          </div>
                          <small class="form-text text-danger"><?php echo isset( $_SESSION['ohab_name'] )?$_SESSION['ohab_name']:''; $_SESSION['ohab_name'] = "";?></small>
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