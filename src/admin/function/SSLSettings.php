<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
    'username' => $_POST['username'],
    'password' => $_POST['password'],
	);
	$sql = mysqli_query($connect,"UPDATE `hosting_ssl_api` SET `api_username`='".$FormData['username']."',`api_password`='".$FormData['password']."' WHERE `api_key`='FREESSL'");
	if($sql){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  SSL API updated <b>successfully!</b>
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