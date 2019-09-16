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
                    <?php if(isset($_SESSION['insertion_problem'])){ echo $_SESSION['insertion_problem']?'<div id="hideMe" class="alert alert-success alert-dismissible fade show" role="alert">'.$_SESSION['insertion_problem'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>':''; $_SESSION['insertion_problem']='';} ?>
                    <form action="<?php echo url('category/save'); ?>" method="post" enctype="multipart/form-data"><!-- 
                      <?php //$_SESSION['csrf_token']=md5(rand()); ?>
                      <input type="hidden" name="csrf_token" value="<?php //echo $_SESSION['csrf_token']; ?>"> -->
                      <fieldset>
                        <legend>Create New Category</legend>
                        <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                              <label for="category_name">Category Name</label>
                              <div class="has-clearable">
                                <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Category Name...">
                              </div>
                              <small class="form-text text-danger"><?php echo isset( $_SESSION['category_name'] )?$_SESSION['category_name']:''; $_SESSION['category_name'] = "";?></small>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="category_status">Category Status</label>
                              <select class="custom-select custom-select-sm" id="category_status" name="category_status">
                                <option value="1"> Active </option>
                                <option value="Inactive"> Inactive </option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-actions">
                            <button class="btn btn-primary mx-2" type="submit">Submit</button>
                            <button class="btn btn-warning mx-2" type="reset">Reset</button>
                          </div>
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