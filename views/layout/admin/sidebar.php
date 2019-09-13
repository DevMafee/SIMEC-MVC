<aside class="app-aside app-aside-expand-md app-aside-light">
	<div class="aside-content">
	  <header class="aside-header d-block d-md-none">
	    <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="<?php echo base_url('site_link'); ?>assets/user_photo/salman.jpg" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name"><?php echo $_SESSION['user_id']!=''?$_SESSION['fullname']:''; ?></span> <span class="account-description">Marketing Manager</span></span></button>
	    <div id="dropdown-aside" class="dropdown-aside collapse">
	      <div class="pb-3">
	        <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> Logout</a>
	        <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
	      </div>
	    </div>
	  </header>
	  <div class="aside-menu overflow-hidden">
	    <nav id="stacked-menu" class="stacked-menu">
	      <ul class="menu">
	        <li class="menu-item has-active">
	          <a href="<?php echo url('dashboard'); ?>" class="menu-link"><span class="menu-icon fa fa-home"></span> <span class="menu-text">Dashboard</span></a>
	        </li>
		<?php
			if ($_SESSION['user_type']=='Master Admin' || $_SESSION['user_type']=='Super Admin') {
		?>
	        <li class="menu-item has-child">
	          <a href="#" class="menu-link"><span class="menu-icon fa fa-gears"></span> <span class="menu-text">Settings</span></a>
	          <ul class="menu">
	            <li class="menu-item">
	              <a href="<?php echo url('modules/create'); ?>" class="menu-link">Make New Module</a>
	            </li>
	            <li class="menu-item">
	              <a href="<?php echo url('modules/all'); ?>" class="menu-link">All Modules</a>
	            </li>
	            <li class="menu-item has-child">
	              <a href="#" class="menu-link">Sub Modules</a>
	              <ul class="menu">
	                <li class="menu-item">
	                  <a href="page-team.html" class="menu-link">Create Sub Module</a>
	                </li>
	                <li class="menu-item">
	                  <a href="page-team-feeds.html" class="menu-link">All Sub Module</a>
	                </li>
	              </ul>
	            </li>
	            <li class="menu-item has-child">
	              <a href="#" class="menu-link">Users</a>
	              <ul class="menu">
	                <li class="menu-item">
	                  <a href="<?php echo url('users/create'); ?>" class="menu-link">Create User</a>
	                </li>
	                <li class="menu-item">
	                  <a href="<?php echo url('users/all'); ?>" class="menu-link">All Users</a>
	                </li>
	              </ul>
	            </li>
	          </ul>
	        </li>
	    <?php
	    	}
	    ?>
	        <hr>
	    <?php
	    	// include('config/functions.php');
	    	
	    ?>
	      </ul>
	    </nav>
	  </div>
	  <footer class="aside-footer border-top p-3">
	    <div class="copyright"> Copyright © <?php echo date('Y'); ?>. <b style="color: darkcyan;">SIMEC System</b>. </div>
	  </footer>
	</div>
</aside>