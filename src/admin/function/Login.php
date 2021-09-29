<?php
require __DIR__.'/Connect.php';
if(isset($_POST['login'])){
	$FormData = array(
		'email' => $_POST['email'],
		'password' => $_POST['password'],
		'email_hashed' => base64_encode($_POST['email'])
	);
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_admin` WHERE `admin_email`='".$FormData['email']."'");
	if(mysqli_num_rows($sql)>0){
		$Data = mysqli_fetch_assoc($sql);
		if($Data['admin_password']==sha1($FormData['password'])){
			if(isset($_POST['remember'])){
				$_SESSION['LEASESS'] = $FormData['email_hashed'];
			}
			else{
				$_SESSION['LEASESS'] = $FormData['email_hashed'];
			}
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Logged in <b>successfully!</b>
									</div>';
			header('location: ../index.php');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Invalid <b>email address </b>or<b> password!</b>
									</div>';
			header('location: ../login.php');
		}

	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Invalid <b>email address </b>or<b> password!</b>
									</div>';
		header('location: ../login.php');
	}
}
else{
	header('location: ../login.php');
}
?>