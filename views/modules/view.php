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
                    <!-- .table -->
                    <div id="dt-responsive_wrapper" class="dataTables_wrapper dt-bootstrap4">
                      <div class="table-responsive">
                        <table id="dt-responsive" class="table dt-responsive nowrap w-100 table-hover">
                          <thead>
                            <tr role="row">
                              <th> Module Name </th>
                              <th> Ranking </th>
                              <th> Action </th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            foreach ($this->data as $value) {
                          ?>
                            <tr>
                              <td><?php echo $value['modules_name']; ?></td>
                              <td><?php echo $value['modules_rank']; ?></td>
                              <td><a href=""><i class="fa fa-pencil text-warning"></i></a> <a href=""><i class="fa fa-eye"></i></a> <a href=""><i class="fa fa-trash text-danger"></i></a><?php echo $value['modules_id']; ?></td>
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