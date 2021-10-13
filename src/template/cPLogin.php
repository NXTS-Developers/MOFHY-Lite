<div class="container-fluid">
	<div class="card py-0">
		<div class="d-flex justify-content-between align-items-center pt-15">
			<h5 class="m-0">cPanel Login</h5>
			<a href="<?php echo $AreaInfo['area_url'];?>viewaccount.php?account_id=<?php echo $_GET['account_id'];?>" class="btn btn-danger btn-sm"><i class="fa fa-backward"></i> Return</a>
		</div><hr>
		<?php $AccountInfo = mysqli_fetch_assoc($sql);?>
		<div class="mb-15">
			<p>You will now be redirected to the control panel. It can take up to 5 seconds based on your internet connecion speed.</p>
			<form action="https://<?php echo $HostingApi['api_cpanel_url']?>/login.php" id="Login" method="post" name="login">
			<input type="hidden" name="uname" value="<?php echo $AccountInfo['account_username'];?>" alt="username">
			<input type="hidden" name="passwd" value="<?php echo $AccountInfo['account_password'];?>" alt="password">
				<div class="text-center">
					<input type="submit" name="Submit" value="Click here to Redirect" class="btn btn-primary btn-sm text-white">
				</div>
			</form>
		</div>
	</div>
</div>
<script type="text/javascript">
	document.getElementById('Login').submit(); // SUBMIT FORM 
</script>