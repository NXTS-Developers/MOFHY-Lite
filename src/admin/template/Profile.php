<div class="container-fluid">
	<div class="card py-15 pb-20">
		<div class="d-flex justify-content-between align-items-center px-5">
			<h5 class="m-0">My Profile</h5>
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
				<h6 class="mb-0"><b>Shared IP</b> <?php echo gethostbyname($_SERVER['HTTP_HOST']);?></h6>
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
				<h6 class="mb-0"><b>Alert Email:</b> <?php echo $AreaInfo['area_email'];?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Clientarea Status:</b> <?php if($AreaInfo['area_status']==1){echo '<span class="badge badge-success">Live</span>';}elseif($AreaInfo['area_status']==0){echo '<span class="badge badge-secondary">Maintaince</span>';}?></h6>
			</div>
			<div class="col-md-12"><hr></div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Document Root:</b> <?php echo $_SERVER['DOCUMENT_ROOT']?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>Server Protocol:</b> <?php echo strtoupper($_SERVER['REQUEST_SCHEME'])?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>PHP Version:</b> <?php echo PHP_VERSION?></h6>
			</div>
			<div class="col-md-6">
				<h6 class="mb-0"><b>MOFHY Version:</b> <?php echo get_mofhy_version();?></h6>
			</div>
			<div class="col-md-12 my-5">
				<a href="mysettings.php" class="btn m5t btn-sm btn-primary">Update Profile</a>
				<a href="https://en.gravatar.com/" target="_blank" class="btn m5t btn-sm btn-secondary">Update Image</a>
			</div>
		</div>
	</div>
</div>