<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
if(isset($_POST['validate'])){
	$FormData = array(
		'token' => mysqli_real_escape_string($connect, '$2y$10$'.$_POST['validation_key']),
		'key' => $ClientInfo['hosting_client_key'],
	);
	if(password_verify($FormData['key'], $FormData['token'])){
		$sql = mysqli_query($connect,"UPDATE `hosting_clients` SET `hosting_client_status`='1' WHERE `hosting_client_key`='".$FormData['key']."'");
		if($sql){
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  validated <b>successfully!</b>
									</div>';
			header('location: ../index.php');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../index.php');
		}
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Invalid validation <b>key!</b>
									</div>';
		header('location: ../index.php');
	}
}
else{
	header('location: ../');
}
?>