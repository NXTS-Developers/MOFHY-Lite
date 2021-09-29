<div class="container-fluid">
	<div class="card py-20">
		<div class="d-flex justify-content-between align-items-center ">
			<p class="m-0"><b>My Profile</b></p>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/index.php" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		<div class="row">
			<div class="col-md-6">
				<h6 class="mb-0"><b>First Name:</b> <?php echo $AdminInfo['admin_fname'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Last Name:</b> <?php echo $AdminInfo['admin_lname'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Email Address:</b> <?php echo $AdminInfo['admin_email'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>IP Address:</b> <?php echo UserInfo::get_ip();?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Device Type:</b> <?php echo UserInfo::get_device();?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Device OS:</b> <?php echo UserInfo::get_os();?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Web Browser:</b> <?php echo UserInfo::get_browser();?></h6>
			</div>
			<div class="col-md-12"><hr></div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Clientarea Name:</b> <?php echo $AreaInfo['area_name'];?></h6>
			</div>

			<div class="col-md-6">
				<h6 class="mb-0"><b>Clientarea URI:</b> <?php echo $AreaInfo['area_url'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Clientarea Email:</b> <?php echo $AreaInfo['area_email'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Clientarea Status:</b> <?php if($AreaInfo['area_status']==1){echo '<span class="badge badge-success">Live</span>';}elseif($AreaInfo['area_status']==0){echo '<span class="badge badge-secondary">Maintaince</span>';}?></h6>
			</div>
			<div class="col-md-12"><hr></div>
			<?php
				$sql = mysqli_query($connect,"SELECT * FROM `hosting_smtp` WHERE `smtp_key`='SMTP'");
				$SMTP = mysqli_fetch_Assoc($sql);
			?>
			<div class="col-md-6">
				<h6 class="mb-0"><b>SMTP Hostanme:</b> <?php echo $SMTP['smtp_host'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>SMTP Username:</b> <?php echo $SMTP['smtp_username'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>SMTP Password:</b> <?php echo $SMTP['smtp_password'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>SMTP Port:</b> <?php echo $SMTP['smtp_port'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>SMTP From:</b> <?php echo $SMTP['smtp_from'] ?></h6>
			</div>
			<div class="col-md-12"><hr></div>
			<?php
				$sql = mysqli_query($connect,"SELECT * FROM `hosting_account_api` WHERE `api_key`='MOFHAPI'");
				$HostingApi = mysqli_fetch_Assoc($sql);
			?>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Hosting API Username:</b> <pre class='my-0 mr-15' style="overflow-x: hidden;"><?php echo $HostingApi['api_username'];?></pre></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Hosting API Password:</b> <pre class='my-0 mr-15' style="overflow-x: hidden;"><?php echo $HostingApi['api_password'];?></pre></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Hosting cPanel URl:</b> <?php echo $HostingApi['api_cpanel_url'] ?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Hosting Server IP:</b> <?php echo $HostingApi['api_server_ip'] ?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Hosting Namesever 1:</b> <?php echo $HostingApi['api_ns_1'] ?></h6>
			</div>

			<div class="col-md-6">
				<h6 class="mb-0"><b>Hosting Nameserver 2:</b> <?php echo $HostingApi['api_ns_2'] ?></h6>
			</div>

			<div class="col-md-6">
				<h6 class="mb-0"><b>Hosting cPanel URl:</b> <?php echo $HostingApi['api_package'] ?></h6>
			</div>
			<div class="col-md-12"><hr></div>
			<?php
				$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl_api` WHERE `api_key`='FREESSL'");
				$SSLInfo = mysqli_fetch_Assoc($sql);
			?>
			<div class="col-md-6">
				<h6 class="mb-0"><b>SSL API Hostanme:</b> <?php echo $SSLInfo['api_username'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>SSL API Username:</b> <?php echo $SSLInfo['api_password'];?></h6>
			</div>
			<div class="col-md-12">
				<a href="mysettings.php" class="btn m5t btn-sm btn-primary">Update Profile</a>
				<a href="https://en.gravatar.com/" target="_blank" class="btn m5t btn-sm btn-secondary">Update Image</a>
			</div>
		</div>
	</div>
</div>