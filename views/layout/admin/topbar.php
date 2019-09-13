<header class="app-header app-header-dark">
  <div class="top-bar">
    <div class="top-bar-brand">
      <a href="<?php echo url(''); ?>"><img src="<?php echo base_url('site_link'); ?>assets/images/logo.png" style="width:240px; height:60px; margin-left: -1rem;"></a>
    </div>
    <div class="top-bar-list">
      <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
        <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
      </div>
      <div class="top-bar-item top-bar-item-full">
        <?php include('include/search.php'); ?>
      </div>
      <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
        <ul class="header-nav nav">
          <?php include('include/1st.php'); ?>
          <?php include('include/2nd.php'); ?>
          <?php include('include/3rd.php'); ?>
        </ul>
        <?php include('include/pro.php'); ?>
      </div>
    </div>
  </div>
</header>