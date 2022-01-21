<?php
include __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
		'old_password' => mysqli_real_escape_string($connect, $_POST['old_password']),
		'new_password' => mysql_real_escape_string($connect, $_POST['new_password']),
		'hashed_password' => hash('sha256', $_POST['new_password']),
		'user_key' => $AdminInfo['admin_key'],
		'user_password' => $AdminInfo['admin_password'],
	);
	if(hash('sha256', $FormData['old_password'])==$FormData['user_password']){
		$sql = mysqli_query($connect,"UPDATE `hosting_admin` SET `admin_password`='".$FormData['hashed_password']."' WHERE `admin_key`='".$FormData['user_key']."'");
		if($sql){
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Password changed <b>successfully!</b>
									</div>';
			unset($_SESSION['LEASESS']);
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
