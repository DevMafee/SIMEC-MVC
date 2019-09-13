		</div><!-- /.app -->
    <!-- BEGIN BASE JS -->
    <script src="<?php echo base_url('site_link'); ?>assets/bootstrap/js/jquery.min.js"></script>
    <script src="<?php echo base_url('site_link'); ?>assets/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url('site_link'); ?>assets/bootstrap/js/bootstrap.min.js"></script> <!-- END BASE JS -->
    <!-- BEGIN PLUGINS JS -->
    <script src="<?php echo base_url('site_link'); ?>assets/bootstrap/js/pace.min.js"></script>
    <script src="<?php echo base_url('site_link'); ?>assets/bootstrap/js/stacked-menu.min.js"></script>
    <script src="<?php echo base_url('site_link'); ?>assets/bootstrap/js/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url('site_link'); ?>assets/bootstrap/js/flatpickr.min.js"></script>
    <script src="<?php echo base_url('site_link'); ?>assets/bootstrap/js/jquery.easypiechart.min.js"></script>
    <script src="<?php echo base_url('site_link'); ?>assets/bootstrap/js/Chart.min.js"></script> <!-- END PLUGINS JS -->
    <!-- BEGIN THEME JS -->
    <script src="<?php echo base_url('site_link'); ?>assets/bootstrap/js/theme.min.js"></script> <!-- END THEME JS -->
    <!-- BEGIN PAGE LEVEL JS -->
    <!-- <script src="assets/javascript/pages/dashboard-demo.js"></script> -->
    <script>
      $(document).ready(function(){
        var path = window.location;
        if ( path == 'dashboard' || path == '') {
          path = './';
        }
        var target = $('ul li a[href="'+path+'"]');
        target.parent().addClass('has-active');
        target.parent().parent().parent().addClass('has-active');
        target.parent().parent().parent().parent().parent().addClass('has-active');
      })
    </script>
  </body>
</html>