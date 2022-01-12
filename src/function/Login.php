<?php
require __DIR__.'/Connect.php';
if(isset($_POST['login'])){
	$FormData = array(
		'email' => $_POST['email'],
		'password' => $_POST['password']
	);
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_clients` WHERE `hosting_client_email`='".$FormData['email']."'");
	if(mysqli_num_rows($sql)>0){
		$Data = mysqli_fetch_assoc($sql);
		if($Data['hosting_client_password']==sha1($FormData['password'])){
			if(isset($_POST['remember'])){
				setcookie('LEFSESS',base64_encode($Data['hosting_client_key']),time()+30*86400,'/');
			}
			else{
				setcookie('LEFSESS',base64_encode($Data['hosting_client_key']),time()+86400,'/');
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
									  Account doesn'."'".'t <b>exsist!</b>
									</div>';
		header('location: ../login.php');
	}
}
else{
	header('location: ../login.php');
}
?>