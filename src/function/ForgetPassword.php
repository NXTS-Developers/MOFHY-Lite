<?php
require __DIR__.'/Connect.php';
include __DIR__.'/../handler/AreaHandler.php';
if(isset($_POST['reset'])){
	$FormData = array(
		'email' => $_POST['email']
	);
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_clients` WHERE `hosting_client_email`='".$FormData['email']."'");
	if(mysqli_num_rows($sql)>0){
		$Data = mysqli_fetch_assoc($sql);
		$TokenId = password_hash($Data['hosting_client_key'], PASSWORD_DEFAULT);
		$TokenData = [['token' => str_replace('$2y$10$', '', $TokenId),'email' => $FormData['email']]];
		$Token = base64_encode(json_encode($TokenData));
		$EmailTo = [['email' => $FormData['email']]];
		$Body = "
			<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
			<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
			<h2 style='text-align:center;color:skyblue;'><b>Reset Password</b></h2><hr>
			<h3>Hi ".$Data['hosting_client_fname'].",</h3><p>You have requested a password reset. If you have not requested a password reset please let us know opening a support ticket in the hosting clientarea.</p><br>
			<div style='margin:1rem;padding:1rem;background:rgb(230,230,230);overflow-x:auto;'>
				".$Token."
			</div>
			<br>
			<p>After changing password please login to your account ❤</p>
			<p>Regards ".$AreaInfo['area_name']."</p>
			<hr>
			<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
			</div>
			</div>";
		$Email = array(
			'subject' => 'Forget Password',
			'body' => $Body
		);
		include __DIR__.'/../handler/EmailHandler.php';
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Email sent <b>successfully!</b>
									</div>';
		header('location: ../resetpassword.php');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Invalid <b>email</b> or <b>password!</b>
									</div>';
		header('location: ../forgetpassword.php');
	}
}
else{
	header('location: ../');
}
?>