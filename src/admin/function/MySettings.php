<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
    'fname' => mysqli_real_escape_string($connect, $_POST['fname']),
    'lname' => mysqli_real_escape_string($connect, $_POST['lname']),
    'key' => $AdminInfo['admin_key']
	);
	$sql = mysqli_query($connect,"UPDATE `hosting_admin` SET `admin_fname`='".$FormData['fname']."',`admin_lname`='".$FormData['lname']."' WHERE `admin_key`='".$FormData['key']."'");
	if($sql){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Profile updated <b>successfully!</b>
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