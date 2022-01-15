<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
    'host' => mysqli_real_escape_string($connect, $_POST['host']),
    'username' => mysqli_real_escape_string($connect, $_POST['username']),
    'password' => mysqli_real_escape_string($connect, $_POST['password']),
    'port' => mysqli_real_escape_string($connect, $_POST['port']),
    'from' => mysqli_real_escape_string($connect, $_POST['from'])
	);
	$sql = mysqli_query($connect,"UPDATE `hosting_smtp` SET `smtp_host`='".$FormData['host']."',`smtp_username`='".$FormData['username']."',`smtp_password`='".$FormData['password']."',`smtp_port`='".$FormData['port']."',`smtp_from`='".$FormData['from']."' WHERE `smtp_key`='SMTP'");
	if($sql){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  SMTP updated <b>successfully!</b>
									</div>';
		header('location: ../apisettings.php');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
		header('location: ../apisettings.php');
	}
}
else{
	header('location: ../');
}
?>