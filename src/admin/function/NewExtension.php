<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
		'domain' => '.'.strtolower($_POST['domain'])
	);
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_domain_extensions` WHERE `extension_value`='".$FormData['domain']."'");
	if(mysqli_num_rows($sql)>0){
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Extension aleady  <b>exsist!</b>
									</div>';
		header('location: ../extensions.php');
		exit;
	}
	else{
		$sql = mysqli_query($connect,"INSERT INTO `hosting_domain_extensions`(`extension_value`) VALUES ('".$FormData['domain']."')");
		if($sql){
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Extension added <b>successfully!</b>
										</div>';
			header('location: ../extensions.php');
			exit;
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something went'."'".'s <b>wrong!</b>
										</div>';
			header('location: ../extensions.php');
			exit;
		}
	}
}
else{
	header('location: ../');
}
?>
