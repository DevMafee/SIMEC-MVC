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
                    <!-- .table -->
                    <div id="dt-responsive_wrapper" class="dataTables_wrapper dt-bootstrap4">
                      <div class="table-responsive">
                        <table id="dt-responsive" class="table dt-responsive nowrap w-100 table-hover">
                          <thead>
                            <tr role="row">
                              <th> Label </th>
                              <th> Field Name </th>
                              <th> Data </th>
                              <th> Required? </th>
                              <th> Status </th>
                              <th> Action </th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            foreach ($this->data as $value) {
                              if ($value['field_status']=='no') {
                                $status = '<span class="badge badge-warning"> Inactive </span>';
                                $button = '<a href="#" data-toggle="modal" title="Active Field" data-target="#Retrive'.$value['field_id'].'"><i class="fa fa-check-circle text-success"></i></a>';
                              }else{
                                $status = '<span class="badge badge-success"> Active </span>';
                                $button = '<a href="#" data-toggle="modal" title="Delete Module" data-target="#Delete'.$value['field_id'].'"><i class="fa fa-trash text-danger"></i></a>';
                              }
                          ?>
                            <tr>
                              <td><?php echo $value['field_label']; ?></td>
                              <td><?php echo $value['field_name']; ?></td>
                              <td><?php echo $value['field_data_type']; ?></td>
                              <td><?php echo $value['field_required']; ?></td>
                              <td><?php echo $status; ?></td>
                              <td><?php echo $button; ?></td>
                            </tr>
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