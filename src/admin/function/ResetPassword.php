<?php
include __DIR__.'/Connect.php';
require_once __DIR__.'/../handler/AreaHandler.php';
if(isset($_POST['reset'])){
	$FormData = array(
		'token' =>mysqli_real_escape_string($connect, $_POST['token']),
		'new_password' =>mysqli_real_escape_string($connect, $_POST['password']),
		'hashed_password' => hash('sha256', $_POST['password']),
	);
	$UserID = json_decode(base64_decode($_POST['token']));
	$Email = $UserID[0]->email;
	$Key = '$2y$10$'.$UserID[0]->token;
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_admin` WHERE `admin_email`='".$Email."'");
	$Data = mysqli_fetch_Assoc($sql);
	if(password_verify($Data['admin_key'], $Key)){
		$sql = mysqli_query($connect,"UPDATE `hosting_admin` SET `admin_password`='".$FormData['hashed_password']."' WHERE `admin_key`='".$Data['admin_key']."'");
		if($sql){
			$EmailTo = [['email' => $Email]];
			$Body = "
				<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
				<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
				<h2 style='text-align:center;color:skyblue;'><b>Reset Password</b></h2><hr>
				<h3>Hi ".$Data['admin_fname'].",</h3><p>Your account password had ben reset successfully. please login to use our services again.</p><br>
				<p>After login to your account you can use any service ❤</p>
				<p>Regards ".$AreaInfo['area_name']."</p>
				<hr>
				<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
				</div>
				</div>";
			$Email = array(
				'subject' => 'Reset Password',
				'body' => $Body
			);
			include __DIR__.'/../handler/EmailHandler.php';
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Password reset <b>successfully!</b>
									</div>';
			header('location: ../login.php');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../resetpassword.php');
		}
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Invalid reset <b>token!</b>
									</div>';
		header('location: ../resetpassword.php');
	}
}
else{
	header('location: ../');
}
?>
