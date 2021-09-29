<?php
if(isset($_COOKIE['LEFSESS'])){
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_clients` WHERE `hosting_client_email`='".base64_decode($_COOKIE['LEFSESS'])."'");
	if(mysqli_num_rows($sql)>0){
		$ClientInfo = mysqli_fetch_Assoc($sql);
	}
	else{
		setcookie('LEFSESS','NULL',-1,'/');
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Login to <b>continue!</b>
									</div>';
		header('location: login.php');
	}
}
else{
	$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Login to <b>continue!</b>
									</div>';
	header('location: login.php');
}
?>