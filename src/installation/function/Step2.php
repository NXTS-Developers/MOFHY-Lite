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
    'fname' => htmlentities(mysqli_real_escape_string($connect, $_POST['first'])),
    'lname' => htmlentities(mysqli_real_escape_string($connect, $_POST['last'])),
    'password' => hash('sha256', htmlentities(mysqli_real_escape_string($connect, $_POST['password']))),
    'email' => htmlentities(mysqli_real_escape_string($connect, $_POST['email'])),
    'key' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'),0,8)
	);
	$sql = mysqli_query($connect,"INSERT INTO `hosting_admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_email`, `admin_key`, `admin_password`) VALUES
(1, '".$FormData['fname']."', '".$FormData['lname']."', '".$FormData['email']."','".$FormData['key']."', '".$FormData['password']."')");
	if($sql){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Admin registered <b>successfully!</b>
									</div>';
		header('location: ../install.php?step=3');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
		header('location: ../install.php?step=2');
	}
}
?>
