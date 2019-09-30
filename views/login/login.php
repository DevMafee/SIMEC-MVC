<div class="card" style="background: url(<?php echo url('assets/images/login_bg.jpg'); ?>);background-repeat: no-repeat;background-size: cover;">
	<div class="row">
		<div class="col-md-8"></div>
		<div class="col-md-4" style="margin: 150px auto;">
			<form class="card-body" action="<?php echo base_url('site_link'); ?>login/run" method="post">
				<?php $_SESSION['csrf_token']=md5(rand()); ?>
				<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
				  <div class="form-group">
				    <label for="username" class="text-white">Email address</label>
				    <input type="text" class="form-control" name="username" placeholder="Enter email">
				    <small id="username_error" class="form-text text-danger"></small>
				  </div>
				  <div class="form-group">
				    <label for="password" class="text-white">Password</label>
				    <input type="password" class="form-control" name="password" placeholder="Password">
				    <small id="password_error" class="form-text text-danger"></small>
				  </div>
				  <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
</div>