<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">Account Settings</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>viewaccount.php?account_id=<?php echo $_GET['account_id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		<?php $AccountInfo = mysqli_fetch_assoc($sql);?>
		<div class="mb-15">
			<div class="row">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Your Name</label>
						<input type="text" name="name" value="<?php echo $ClientInfo['hosting_client_fname'].' '.$ClientInfo['hosting_client_lname'];?>" class="form-control disabled" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Your Email</label>
						<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_email'];?>" class="form-control disabled" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Phone Number</label>
						<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_phone'];?>" class="form-control disabled" readonly>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Billing Address</label>
						<input type="text" name="email" value="<?php echo $ClientInfo['hosting_client_address'];?>" class="form-control disabled" readonly>
					</div>
				</div>
			</div>
			<div class="col-md-12"><hr></div>
			<form class="row" action="function/ChangePassword.php" method="post">
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">New Password</label>
						<input type="password" name="new_password" placeholder="New password here..." class="form-control">
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-10 px-10">
						<label class="form-label required">Old Password</label>
						<input type="password" name="old_password" placeholder="Old password here..." class="form-control">
						<input type="hidden" name="account_username" value="<?php echo $AccountInfo['account_username'];?>">
						<input type="hidden" name="account_password" value="<?php echo $AccountInfo['account_password'];?>">
						<input type="hidden" name="account_key" value="<?php echo $AccountInfo['account_key'];?>">
					</div>
				</div>
				<div class="col-md-12">
					<div class="mb-10 px-10">
						<input type="submit" name="submit" value="Change Password" class="btn btn-primary btn-sm text-white">
					</div>
				</div>
			</form><hr>
			<form  action="function/DeactivateAccount.php" method="post" onsubmit="
					var reason = document.getElementById('reason').value;
					if(reason.length<8){
						alert('Reason must be 8 characters long...');
						return false;
					}
					return true;
				">
				<p class="text-muted mx-10 alert alert-secondary">Your account will be deleted after 30 days of your account deactivation and all of the account data will be removed completely(This action cannot be undo).</p>
				<div class="mb-10 px-10">
					<label class="form-label required">Deacivation Reason</label>
					<textarea name="reason" placeholder="Deactivation reason here..." class="form-control" id="reason"></textarea>
					<input type="hidden" name="account_username" value="<?php echo $AccountInfo['account_username'];?>">
					<input type="hidden" name="account_key" value="<?php echo $AccountInfo['account_key'];?>">
				</div>
				<div class="mb-10 px-10">
					<input type="submit" name="submit" value="Deactivate Account" class="btn btn-danger btn-sm text-white">
				</div>
			</form>
		</div>
	</div>
</div>
