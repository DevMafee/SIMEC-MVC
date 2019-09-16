<main class="app-main">
  <div class="wrapper">
    <div class="page">
      <div class="page-inner">
        <div class="page-section">
          <div class="row mt-3">
            <div class="col-12 col-lg-12 col-xl-12">
              <div class="card card-fluid">
                <h6 class="card-header"> Users </h6>
                <div class="card-body">
                  <?php if(isset($_SESSION['insertion_success'])){ echo $_SESSION['insertion_success']?'<div id="hideMe" class="alert alert-success alert-dismissible fade show" role="alert">'.$_SESSION['insertion_success'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>':''; $_SESSION['insertion_success']='';} ?>
                  <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th> Category Name </th>
                            <th> Status </th>
                            <th> Action </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                          foreach ($this->data as $value) {
                            if ($value['category_status']==1) {
                              $status = '<span class="badge badge-success"> Active </span>';
                              $style = ' style="display:none;" ';
                              $style_btn = ' style="" ';
                              $style_active = ' style="display:none;" ';
                            }elseif ($value['category_status']==0) {
                              $status = '<span class="badge badge-warning"> Inactive </span>';
                              $style = ' style="display:none;" ';
                              $style_btn = ' style="" ';
                              $style_active = ' style="" ';
                            }elseif ($value['category_status']==3) {
                              $status = '<span class="badge badge-danger"> Deleted </span>';
                              $style = ' style="" ';
                              $style_btn = ' style="display:none;" ';
                              $style_active = ' style="display:none;" ';
                            }else{
                              $status = '<span class="badge badge-info"> Nothing </span>';
                              $style = ' style="display:none;" ';
                              $style_btn = ' style="" ';
                              $style_active = ' style="display:none;" ';
                            }
                        ?>
                          <tr>
                            <td class="align-middle"><?php echo $value['category_name']; ?></td>
                            <td class="align-middle"><?php echo $status; ?></td>
                            <td class="align-middle">
                              <a href="#" class="btn btn-sm btn-icon btn-warning" data-toggle="modal" data-target="#Edit<?php echo $value['category_id']; ?>">
                                <i class="fa fa-pencil"></i> <span class="sr-only">Edit</span>
                              </a>
                              <a href="#" class="btn btn-sm btn-icon btn-info"<?php echo $style; ?> data-toggle="modal" data-target="#Retrive<?php echo $value['category_id']; ?>">
                                <i class="fa fa-check"></i> <span class="sr-only">Retrive</span>
                              </a>
                              <a href="#" class="btn btn-sm btn-icon btn-danger" <?php echo $style_btn; ?> data-toggle="modal" data-target="#Delete<?php echo $value['category_id']; ?>">
                                <i class="fa fa-trash"></i> <span class="sr-only">Remove</span>
                              </a>
                              <a href="#" class="btn btn-sm btn-icon btn-success" <?php echo $style_active; ?> data-toggle="modal" data-target="#Active<?php echo $value['category_id']; ?>">
                                <i class="fa fa-user"></i> <span class="sr-only">Active</span>
                              </a>
                            </td>
                          </tr>
<!-- Edit Modal -->
<div class="modal fade" id="Edit<?php echo $value['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo url('users/update'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="card card-fluid">
            <div class="card-body">
              <input type="hidden" name="category_id" value="<?php echo $value['category_id']; ?>">
              <fieldset>
                <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                      <label for="category_name">Category Name</label>
                      <div class="has-clearable">
                        <button type="button" class="close" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times-circle"></i></span></button>
                        <input type="text" class="form-control" id="category_name" name="category_name" value="<?php echo $value['category_name']; ?>">
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
                        <option value="<?php echo $value['category_status']; ?>"> <?php echo $value['category_status']; ?> </option>
                        <option value="1"> Active </option>
                        <option value="0"> Inactive </option>
                      </select>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
          <button class="btn btn-warning mx-2" type="reset">Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="Delete<?php echo $value['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Category Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo url('category/delete'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="card card-fluid">
            <div class="card-body">
              <input type="hidden" name="category_id" value="<?php echo $value['category_id']; ?>">
              <fieldset>
                <div class="row">
                  <center class="text-danger h3">
                    Delete <?php echo $value['category_name']; ?> ?
                  </center>
                </div>
              </fieldset>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-danger">YES DELETE.</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Retrive Modal -->
<div class="modal fade" id="Retrive<?php echo $value['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Retrive Category Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo url('category/undodelete'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="card card-fluid">
            <div class="card-body">
              <input type="hidden" name="category_id" value="<?php echo $value['category_id']; ?>">
              <fieldset>
                <div class="row">
                  <center class="text-info h3">
                    Retrive <?php echo $value['category_name']; ?> ?
                  </center>
                </div>
              </fieldset>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">YES RETRIVE.</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Active Modal -->
<div class="modal fade" id="Active<?php echo $value['category_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Active Category Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo url('category/active'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="card card-fluid">
            <div class="card-body">
              <input type="hidden" name="category_id" value="<?php echo $value['category_id']; ?>">
              <fieldset>
                <div class="row">
                  <center class="text-info h3">
                    Active <?php echo $value['category_name']; ?> ?
                  </center>
                </div>
              </fieldset>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-info">YES ACTIVE.</button>
        </div>
      </form>
    </div>
  </div>
</div>
                        <?php
                          }
                        ?>
                        </tbody>
                      </table>
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