<div class="dropdown d-flex">
    <button class="btn-account d-none d-md-flex" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="user-avatar user-avatar-md">
        <img src="<?php echo url('assets/user_photo').'/'.$_SESSION['user_photo']; ?>" alt="">
      </span>
      <span class="account-summary pr-lg-4 d-none d-lg-block">
        <span class="account-name"><?php echo $_SESSION['user_id']!=''?$_SESSION['fullname']:''; ?></span>
        <span class="account-description">Marketing Manager</span>
      </span>
    </button>
    <div class="dropdown-menu">
      <div class="dropdown-arrow ml-3"></div>
      <h6 class="dropdown-header d-none d-md-block d-lg-none"> Beni Arisandi </h6>
      <a class="dropdown-item" href="<?php echo url('dashboard/profile'); ?>/<?php echo md5(rand()).md5($_SESSION['user_id']); ?>"><span class="dropdown-icon oi oi-person"></span> Profile</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?php echo url('dashboard/changepassword'); ?>/<?php echo md5(rand()).md5($_SESSION['user_id']); ?>"><span class="dropdown-icon oi oi-lock-unlocked"></span> Change Password</a>
      <a class="dropdown-item" href="#"><span class="dropdown-icon oi oi-code"></span> Help</a>
      <a class="dropdown-item text-danger bg-warning" href="<?php echo url('logout'); ?>"><span class="dropdown-icon oi oi-account-logout text-danger"></span> Logout</a>
    </div>
</div>