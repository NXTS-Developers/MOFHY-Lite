<div class="container-fluid">
	<div class="card p-15">
		<div class="d-flex justify-content-between align-items-center px-5">
			<h5 class="m-0">My Settings</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>admin/index.php" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		  <form action="function/MySettings.php" method="post">
			<div class="row">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">First Name</label>
						<input type="text" name="fname" value="<?php echo $AdminInfo['admin_fname'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Last Name</label>
						<input type="text" name="lname" value="<?php echo $AdminInfo['admin_lname'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Email Address</label>
						<input type="text" name="email" value="<?php echo $AdminInfo['admin_email'];?>" class="form-control disabled" required readonly>
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<button name="submit" class="btn btn-sm btn-primary">Update Profile</button>
				<a href="https://en.gravatar.com/" target="_blank" class="btn m5t btn-sm btn-secondary">Update Image</a>
					</div>
				</div>
				<div class="col-md-12"><hr></div>
			</div>
		</form>
		<form class="row" action="function/MyPassword.php" method="post" onsubmit="
					var password = document.getElementById('password').value;
					var cpassword = document.getElementById('cpassword').value;
					if(password != cpassword){
						alert('Password not match');
						return false;
					}
					return true;
				">
			<div class="col-md-6">
				<div class="mb-10 px-10">
					<label class="form-label required">New Password</label>
					<input type="password" name="new_password" id="password" placeholder="New password here..." class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-10 px-10">
					<label class="form-label required">Confirm Password</label>
					<input type="password" name="confirm_password" id="cpassword" placeholder="Confirm password here..." class="form-control">
				</div>
			</div>
			<div class="col-md-6">
				<div class="mb-10 px-10">
					<label class="form-label required">Old Password</label>
					<input type="password" name="old_password" placeholder="Old password here..." class="form-control">
				</div>
			</div>
			<div class="col-md-12">
				<div class="mb-10 px-10">
					<input type="submit" name="submit" value="Change Password" class="btn btn-sm btn-primary text-white">
				</div>
			</div>
		</form>
		<form action="function/AreaSettings.php" method="post">
			<div class="row">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Clientarea Name</label>
						<input type="text" name="name" value="<?php echo $AreaInfo['area_name'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Clientarea URL</label>
						<input type="text" name="url" value="<?php echo $AreaInfo['area_url'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Clientarea Email</label>
						<input type="text" name="email" value="<?php echo $AreaInfo['area_email'];?>" class="form-control" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Clientarea Status</label>
						<select name="status" class="form-control">
							<?php
								$Statuses = array(
									array('name' => 'Live','value' => '1'),
									array('name' => 'Maintaince','value' => '0'),
								);
								foreach($Statuses as $Status){
									if($Status['value'] == $AreaInfo['area_status']){
										echo '<option value='.$Status['value'].' selected>'.$Status['name'].'</option>';
									}
									else{
										echo '<option value='.$Status['value'].'>'.$Status['name'].'</option>';
									}
								}
							?>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<button name="submit" class="btn btn-sm btn-primary">Update Profile</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>