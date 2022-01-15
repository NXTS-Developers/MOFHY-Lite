<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
    'name' => mysqli_real_escape_string($connect, $_POST['name']),
    'url' => mysqli_real_escape_string($connect, $_POST['url']),
    'email' => mysqli_real_escape_string($connect, 
    $_POST['email']),
    'status' => $_POST['status']
	);
	$sql = mysqli_query($connect,"UPDATE `hosting_area` SET `area_name`='".$FormData['name']."',`area_url`='".$FormData['url']."',`area_email`='".$FormData['email']."',`area_status`='".$FormData['status']."' WHERE `area_key`='AREA'");
	if($sql){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Clientarea updated <b>successfully!</b>
									</div>';
		header('location: ../mysettings.php');
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
	header('location: ../');
}
?>