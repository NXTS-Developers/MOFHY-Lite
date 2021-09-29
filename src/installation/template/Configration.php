<div class="container-fluid" id='login'>	
	<div class="row">
		<div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4">
			<div class="card mx-30" style="opacity: 80%">
				<h5 class="text-center my-0">Configration</h5><hr>
				<form action="function/Configration.php" method="post">
					<div class="mb-5">
						<label class="form-label">Database Hostname</label>
						<input type="text" name="hostname" class="form-control" placeholder="Enter database hostname here...">
					</div>
					<div class="mb-5">
						<label class="form-label">Database Username</label>
						<input type="text" name="username" class="form-control" placeholder="Enter database username here...">
					</div>
					<div class="mb-5">
						<label class="form-label">Database Password</label>
						<input type="password" name="password" class="form-control" placeholder="Enter database password here...">
					</div>
					<div class="mb-10">
						<label class="form-label">Database Name</label>
						<input type="text" name="name" class="form-control" placeholder="Enter database name here...">
					</div>
					<div class="mb-0">
						<input type="submit" name="submit" class="btn btn-primary mb-0" value="Validate">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
