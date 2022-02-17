<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_GET['client_id'])){
	$sql = mysqli_query($connect,"UPDATE `hosting_clients`SET `hosting_client_status`=2 WHERE `hosting_client_key`='".mysqli_real_escape_string($connect, $_GET['client_id'])."'");
	if($sql){
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Client suspended <b>successfully!</b>
									</div>';
			header('location: ../viewclient.php?client_id='.$_GET['client_id']);
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../viewclient.php?client_id='.$_GET['client_id']);
		}
	}
else{
	header('location: ../login.php');
}
?>