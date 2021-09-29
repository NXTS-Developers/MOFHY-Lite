<?php
include __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
		'old_password' => $_POST['old_password'],
		'new_password' => $_POST['new_password'],
		'hashed_password' => sha1($_POST['new_password']),
		'user_key' => $ClientInfo['hosting_client_key'],
		'user_password' => $ClientInfo['hosting_client_password'],
	);
	if(sha1($FormData['old_password'])==$FormData['user_password']){
		$sql = mysqli_query($connect,"UPDATE `hosting_clients` SET `hosting_client_password`='".$FormData['hashed_password']."' WHERE `hosting_client_key`='".$FormData['user_key']."'");
		if($sql){
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Password changed <b>successfully!</b>
									</div>';
			setcookie('LEFSESS','NULL',-1,'/');
			header('location: ../login.php');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../mysettings.php');
		}
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Invalid user <b>password!</b>
									</div>';
		header('location: ../mysettings.php');
	}
}
else{
	header('location: ../');
}
?>