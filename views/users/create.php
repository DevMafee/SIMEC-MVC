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
                    <form action="<?php echo url('users/save'); ?>" method="post" enctype="multipart/form-data">
                      <?php $_SESSION['csrf_token']=md5(rand()); ?>
                      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                      <fieldset>
                        <legend>Create New User</legend>
                        <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                              <label for="full_name">Full Name</label>
                              <div class="has-clearable">
                                <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Full Name...">
                              </div>
                              <small class="form-text text-danger"><?php echo isset( $_SESSION['full_name'] )?$_SESSION['full_name']:''; $_SESSION['full_name'] = "";?></small>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="username">User Name</label>
                              <div class="has-clearable">
                                <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                <input type="text" class="form-control" id="username" name="username" placeholder="User Name...">
                              </div>
                              <small class="form-text text-danger"><?php echo isset( $_SESSION['username'] )?$_SESSION['username']:''; $_SESSION['username'] = "";?></small>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="password">Password</label>
                              <div class="has-clearable">
                                <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password ..">
                              </div>
                              <small class="form-text text-danger"><?php echo isset( $_SESSION['password'] )?$_SESSION['password']:''; $_SESSION['password'] = "";?></small>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="user_type">User Type</label>
                              <select class="custom-select custom-select-sm" id="user_type" name="user_type">
                                <option value="User"> User </option>
                                <option value="Admin"> Admin </option>
                                <option value="Super Admin"> Super Admin </option>
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