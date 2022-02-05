<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
include __DIR__.'/../handler/AreaHandler.php';
if(isset($_GET['resend']) == 'true'){
	$Token = str_replace('$2y$10$', '', password_hash($ClientInfo['hosting_client_key'], PASSWORD_DEFAULT));
	$EmailTo = [['email' => $ClientInfo['hosting_client_email']]];
	$Body = "
				<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
				<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
				<h2 style='text-align:center;color:skyblue;'><b>Verify Email</b></h2><hr>
				<h3>Hi ".$ClientInfo['hosting_client_fname'].",</h3><p>We'll like you to be a member of our service. Please copy the code from below inorder to verify your account.</p><br>
				<div style='margin:1rem;padding:1rem;background:rgb(230,230,230);overflow-x:auto;'>
					".$Token."
				</div>
				<br>
				<p>After you login to your account you can use any service ❤</p>
				<p>Regards ".$AreaInfo['area_name']."</p>
				<hr>
				<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
				</div>
				</div>";
	$Email = array(
		'subject' => 'Verify Account',
		'body' => $Body
	);
	include __DIR__.'/../handler/EmailHandler.php';
	$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Email sent <b>successfully!</b>
									</div>';
	header('location: ../validate.php');
}
else{
	header('location: ../');
}
?>
