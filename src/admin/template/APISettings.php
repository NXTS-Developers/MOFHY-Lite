<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center px-5 pt-15">
			<h5 class="m-0">API Settings</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/index.php" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		  <form action="function/MOFHSettings.php" method="post">
			<div class="row">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">MOFH API Username</label>
						<input type="text" name="username" value="<?php echo $HostingApi['api_username'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">MOFH API Password</label>
						<input type="text" name="password" value="<?php echo $HostingApi['api_password'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">cPanel URL</label>
						<input type="text" name="url" value="<?php echo $HostingApi['api_cpanel_url'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Hosting Package</label>
						<input type="text" name="pkg" value="<?php echo $HostingApi['api_package'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Server IP</label>
						<input type="text" name="ip" value="<?php echo $HostingApi['api_server_ip'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Shared IP</label>
						<input type="text" value="<?php echo gethostbyname($_SERVER['HTTP_HOST']);?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Nameserver 1</label>
						<input type="text" name="ns1" value="<?php echo $HostingApi['api_ns_1'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Nameserver 2</label>
						<input type="text" name="ns2" value="<?php echo $HostingApi['api_ns_2'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<button name="submit" class="btn btn-sm btn-primary">Update Settings</button>
					</div>
				</div>
				<div class="col-md-12"><hr></div>
			</div>
		</form>
		<form action="function/SMTPSettings.php" method="post">
			<?php
				$sql = mysqli_query($connect,"SELECT * FROM `hosting_smtp` WHERE `smtp_key`='SMTP'");
				$SMTPInfo = mysqli_fetch_Assoc($sql);
			?>
			<div class="row">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">SMTP Hostname</label>
						<input type="text" name="host" value="<?php echo $SMTPInfo['smtp_host'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">SMTP Username</label>
						<input type="text" name="username" value="<?php echo $SMTPInfo['smtp_username'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">SMTP Password</label>
						<input type="password" name="password" value="<?php echo $SMTPInfo['smtp_password'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">SMTP Port</label>
						<input type="text" name="port" value="<?php echo $SMTPInfo['smtp_port'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Email From</label>
						<input type="text" name="from" value="<?php echo $SMTPInfo['smtp_from'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<button name="submit" class="btn btn-sm btn-primary">Update Settings</button>
					</div>
				</div>
				<div class="col-md-12"><hr></div>
			</div>
		</form>
		<form action="function/SSLSettings.php" method="post">
			<?php
				$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl_api` WHERE `api_key`='FREESSL'");
				$SSLApi = mysqli_fetch_Assoc($sql);
			?>
			<div class="row">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">SSL API Username</label>
						<input type="text" name="username" value="<?php echo $SSLApi['api_username'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">SSL API Password</label>
						<input type="text" name="password" value="<?php echo $SSLApi['api_password'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<button name="submit" class="btn btn-sm btn-primary">Update Settings</button>
					</div>
				</div>
				<div class="col-md-12"><hr></div>
			</div>
		</form>
		<form action="function/BuilderSettings.php" method="post">
			<?php
				$sql = mysqli_query($connect,"SELECT * FROM `hosting_builder_api` WHERE `builder_id`='SITEPRO'");
				$SSLApi = mysqli_fetch_Assoc($sql);
			?>
			<div class="row pb-15">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">SitePro API Username</label>
						<input type="text" name="username" value="<?php echo $SSLApi['builder_username'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">SitePro API Password</label>
						<input type="text" name="password" value="<?php echo $SSLApi['builder_password'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<button name="submit" class="btn btn-sm btn-primary">Update Settings</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>