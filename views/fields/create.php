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
                    <?php if(isset($_SESSION['fields_error'])){ echo $_SESSION['fields_error']?'<div id="hideMe" class="alert alert-success alert-dismissible fade show" role="alert">'.$_SESSION['fields_error'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>':''; $_SESSION['fields_error']='';} ?>
                    <form action="<?php echo url('fields/save'); ?>" method="post">
                      <?php $_SESSION['csrf_token']=md5(rand()); ?>
                      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                      <fieldset>
                        <legend>Create New Field</legend>
                        <div class="form-row">
                          <div class="col-md-6 mb-3 text-danger">
                            <label for="field_form" class="text-danger">Select Form</label>
                            <select class="custom-select d-block w-100" id="field_form" name="field_form" required>
                              <option value=""> Choose... </option>
                          <?php
                            foreach ($this->data as $value) {
                          ?>
                              <option value="<?php echo $value['modules_id']; ?>"> <?php echo $value['modules_name']; ?> </option>
                          <?php
                            }
                          ?>
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-4 mb-3">
                            <label for="field_name">Field name <span class="text-danger"> *</span></label>
                            <div class="has-clearable">
                              <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                              <input type="text" class="form-control" id="field_name" name="field_name" placeholder="Field Name..." required>
                            </div>
                          </div>
                          <input type="hidden" class="form-control" id="field_added_by" name="field_added_by" value="<?php echo $_SESSION['user_id']; ?>" required>
                          <div class="col-md-4 mb-3">
                            <label for="field_label">Field Label <span class="text-danger"> *</span></label>
                            <div class="has-clearable">
                              <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                              <input type="text" class="form-control" id="field_label" name="field_label" placeholder="Field Label..." required>
                            </div>
                          </div>
                          <div class="col-md-2 mb-3">
                            <label for="field_length">Field length <span class="text-danger"> *</span></label>
                            <div class="has-clearable">
                              <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                              <input type="number" class="form-control" id="field_length" name="field_length" required>
                            </div>
                          </div>
                          <div class="col-md-2 mb-3">
                            <label for="field_category">Field Type</label>
                            <select class="custom-select d-block w-100" id="field_category" name="field_category">
                              <option value="text"> Choose... </option>
                              <option value="text"> Text </option>
                              <option value="dropdown"> Dropdown </option>
                              <option value="file"> File </option>
                              <option value="radio"> Radio </option>
                              <option value="checkbox"> Check Box </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-3 mb-3">
                            <label for="field_data_type">Field Data Type <span class="text-danger"> *</span></label>
                            <select class="custom-select d-block w-100" id="field_data_type" name="field_data_type" required>
                              <option value=""> Choose... </option>
                              <option value="varchar"> Varchar </option>
                              <option value="int"> Integer </option>
                              <option value="date"> Date </option>
                              <option value="text"> Text </option>
                            </select>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="field_required">Field Required?</label>
                            <select class="custom-select d-block w-100" id="field_required" name="field_required" required>
                              <option value="no"> Choose... </option>
                              <option value="yes"> Yes </option>
                              <option value="no"> No </option>
                            </select>
                          </div>
                          <div class="col-md-5 mb-3">
                            <label for="field_style">Field Style (<span class="text-danger"> Only Styles </span>)</label>
                            <div class="has-clearable">
                              <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                              <input type="text" class="form-control" id="field_style" name="field_style">
                            </div>
                          </div>
                          <div class="col-md-1 mb-3">
                            <label for="field_readonly">Readonly?</label>
                            <select class="custom-select d-block w-100" id="field_readonly" name="field_readonly">
                              <option value="no"> No </option>
                              <option value="yes"> Yes </option>
                            </select>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="field_js">JavaScript?</label>
                            <textarea class="form-control" id="field_js" name="field_js" rows="2"></textarea>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="field_value">Default Value</label>
                            <input type="text" class="form-control" id="field_value" name="field_value">
                          </div>
                          <div class="col-md-1 mb-3">
                            <label for="field_status">Active?</label>
                            <select class="custom-select d-block w-100" id="field_status" name="field_status">
                              <option value="1"> Yes </option>
                              <option value="0"> No </option>
                            </select>
                          </div>
                        </div>

                        <div class="form-actions">
                          <button class="btn btn-primary mx-2" type="submit">Submit Form</button>
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