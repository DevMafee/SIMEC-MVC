<main class="app-main">
    <div class="wrapper">
      <div class="page">
        <div class="page-inner">
          <div class="page-section">
            <div class="row mt-3">
              <div class="col-12 col-lg-6 col-xl-6">
                <div class="card card-fluid">
                <?php
                  foreach ($this->data as $value) {
                ?>
                  <div class="card-body">
                    <h3 class="card-title"> Your Profile </h3>
                    <div class="pt-3">
                      <div class="chart-inline-group" style="height:214px">
                        <div class="media mb-3 row">
                          <div class="col-5 col-lg-5 col-xl-5">
                            <img src="<?php echo base_url('site_link'); ?>assets/user_photo/<?php echo $value['user_photo']; ?>" alt="" style="width: 100%; height: 200px;">
                          </div>
                          <div class="media-body pl-3 col-7 col-lg-7 col-xl-7">
                            <h3 class="card-title"> <?php echo $value['full_name']; ?></h3>
                            <h6 class="card-subtitle text-muted"> <?php echo $value['user_designation']; ?> </h6>
                            <p class="card-text" style="text-align: justify;">
                              <small><i><?php echo $value['user_bio']; ?></i></small>
                            </p>
                            <div id="progress-avatar" class="progress progress-xs fade">
                              <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php
                    $_SESSION['csrf_profile'] = '';
                  }
                ?>
                </div>
              </div>
              <div class="col-12 col-lg-6 col-xl-6">
                <div class="card card-fluid">
                  <div class="card-body">
                    <div class="pt-3">
                      <div class="chart-inline-group" style="min-height:214px">
                        <form>
                          <fieldset>
                            <legend>Change Password</legend>
                            <div class="form-group">
                              <label for="old_password">Old Password</label>
                              <input type="password" class="form-control" id="old_password" placeholder="Old Password ... .. .">
                              <small id="odl_password_error" class="form-text text-danger">Your Old Password.</small>
                            </div>
                            <div class="form-group">
                              <label for="old_password">New Password</label>
                              <input type="password" class="form-control" id="old_password" placeholder="New Password ... .. .">
                            </div>
                            <div class="form-group">
                              <label for="retype_old_password">Retype New Password</label>
                              <input type="password" class="form-control" id="retype_old_password" placeholder="Retype New Password ... .. .">
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
      </div>
    </div>
</main>