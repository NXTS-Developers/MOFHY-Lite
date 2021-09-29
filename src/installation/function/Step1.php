<?php
ob_start();
session_start();
if(isset($_POST['submit'])){
	include __DIR__."/../../modules/Database/Config.php";
	$connect = mysqli_connect(
	$DataBase['hostname'],
	$DataBase['username'],
	$DataBase['password'],
	$DataBase['name']
	);
	$FormData = array(
    'name' => $_POST['name'],
    'url' => $_POST['url'],
    'email' => $_POST['email'],
	);
	$sql = mysqli_query($connect,"INSERT INTO `hosting_area`(`area_key`,`area_name`,`area_url`,`area_email`,`area_status`) VALUES ('AREA','".$FormData['name']."','".$FormData['url']."','".$FormData['email']."','1')");
	if($sql){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Clientarea updated <b>successfully!</b>
									</div>';
		header('location: ../install.php?step=2');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
		header('location: ../install.php?step=1');
	}
}
?>