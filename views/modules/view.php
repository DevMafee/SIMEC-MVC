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
                    <?php if(isset($_SESSION['modules_success'])){ echo $_SESSION['modules_success']?'<div id="hideMe" class="alert alert-success alert-dismissible fade show" role="alert">'.$_SESSION['modules_success'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>':''; $_SESSION['modules_success']='';} ?>
                    <!-- .table -->
                    <div id="dt-responsive_wrapper" class="dataTables_wrapper dt-bootstrap4">
                      <div class="table-responsive">
                        <table id="dt-responsive" class="table dt-responsive nowrap w-100 table-hover">
                          <thead>
                            <tr role="row">
                              <th> Module Name </th>
                              <th> Ranking </th>
                              <th> Status </th>
                              <th> Action </th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            foreach ($this->data as $value) {
                              if ($value['modules_status']==0) {
                                $status = '<span class="badge badge-warning"> Inactive </span>';
                                $button = '<a href="#" data-toggle="modal" title="Active Module" data-target="#Retrive'.$value['modules_id'].'"><i class="fa fa-check-circle text-success"></i></a>';
                              }else{
                                $status = '<span class="badge badge-success"> Active </span>';
                                $button = '<a href="#" data-toggle="modal" title="Delete Module" data-target="#Delete'.$value['modules_id'].'"><i class="fa fa-trash text-danger"></i></a>';
                              }
                          ?>
                            <tr>
                              <td><?php echo $value['modules_name']; ?></td>
                              <td><?php echo $value['modules_rank']; ?></td>
                              <td><?php echo $status; ?></td>
                              <td><?php echo $button; ?></td>
                            </tr>

<!-- Delete Modal -->
<div class="modal fade" id="Delete<?php echo $value['modules_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Module</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo url('modules/dalete'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="card card-fluid">
            <div class="card-body">
              <input type="hidden" name="modules_id" value="<?php echo $value['modules_id']; ?>">
              <input type="hidden" name="modules_status" value="<?php echo $value['modules_status']; ?>">
              <fieldset>
                <div class="row">
                  <center class="text-danger h3">
                    Delete <?php echo $value['modules_name']; ?> ?
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
<div class="modal fade" id="Retrive<?php echo $value['modules_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Retrive Module Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo url('modules/dalete'); ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="card card-fluid">
            <div class="card-body">
              <input type="hidden" name="modules_id" value="<?php echo $value['modules_id']; ?>">
              <input type="hidden" name="modules_status" value="<?php echo $value['modules_status']; ?>">
              <fieldset>
                <div class="row">
                  <center class="text-info h3">
                    Retrive <?php echo $value['modules_name']; ?> ?
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