<div class="container-fluid" id='login'>	
	<div class="row">
		<div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
			<div class="card mx-30" style="opacity: 80%">
				<form action="function/Login.php" method="post">
					<h5 class="m-0 text-center">Login</h5><hr>
					<div class="mb-10">
						<label class="form-label required">Email Address</label>
						<input type="email" name="email" class="form-control" placeholder="Email Address...">
					</div>
					<div class="mb-10">
						<label class="form-label required">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password...">
					</div>
					  <div class="form-group">
					    <div class="custom-switch">
					      <input type="checkbox" name="remember" value="1" id="remember-my-information">
					      <label for="remember-my-information">Remember me</label>
					    </div>
					  </div>
  					<div class="mb-10 d-grid">
						<button class="btn btn-primary btn-block" name="login">Login</button>
					</div>
				</form>
				<div class="nav-links">
					<a href="<?php echo $AreaInfo['area_url'];?>signup.php">Signup</a> or <a href="<?php echo $AreaInfo['area_url'];?>forgetpassword.php">Recover Password</a>
				</div>
			</div>
		</div>
	</div>
</div>