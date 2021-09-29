<?php
ob_start();
session_start();
if(isset($_SESSION['LEASESS'])){
	unset($_SESSION['LEASESS']);
	$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Logged out <b>successfully!</b>
									</div>';
	header('location: login.php');
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