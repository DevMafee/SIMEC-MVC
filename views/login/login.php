<div class="jumbotron">
	<div class="card" style="max-width: 350px; margin: 20px auto;">
		<form class="card-body" action="<?php echo base_url('site_link'); ?>login/run" method="post">
		<?php $_SESSION['csrf_token']=md5(rand()); ?>
		<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
		  <div class="form-group">
		    <label for="username">Email address</label>
		    <input type="text" class="form-control" name="username" placeholder="Enter email">
		    <small id="username_error" class="form-text text-danger"></small>
		  </div>
		  <div class="form-group">
		    <label for="password">Password</label>
		    <input type="password" class="form-control" name="password" placeholder="Password">
		    <small id="password_error" class="form-text text-danger"></small>
		  </div>
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
</div>