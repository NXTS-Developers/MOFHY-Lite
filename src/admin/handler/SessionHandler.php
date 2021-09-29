<?php
if(isset($_SESSION['LEASESS'])){
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_admin` WHERE `admin_email`='".base64_decode($_SESSION['LEASESS'])."'");
	if(mysqli_num_rows($sql)>0){
		$AdminInfo = mysqli_fetch_Assoc($sql);
	}
	else{
		unset($_SESSION['LEASESS']);
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