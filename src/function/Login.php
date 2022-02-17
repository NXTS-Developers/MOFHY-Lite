<?php
require __DIR__.'/Connect.php';
if(isset($_POST['login'])){
	$FormData = array(
		'email' => mysqli_real_escape_string($connect, $_POST['email']),
		'password' => mysqli_real_escape_string($connect, $_POST['password'])
	);
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_clients` WHERE `hosting_client_email`='".$FormData['email']."'");
	if(mysqli_num_rows($sql)>0){
		$Data = mysqli_fetch_assoc($sql);
		if(trim($Data['hosting_client_password'])==hash('sha256', $FormData['password'])){
			$key = rand(000000,999999);
			$token = hash('sha256', json_encode([$FormData['email'], $Data['hosting_client_key'], $key]));
			if(isset($_POST['remember'])){
				setcookie('LEFSESS', base64_encode(gzcompress(json_encode(['email' => $FormData['email'],'token' => $token,'key' => $key]))), time()+30+86400, '/');
			}
			else{
				setcookie('LEFSESS', base64_encode(gzcompress(json_encode(['email' => $Data['hosting_client_email'],'token' => $token,'key' => $key]))), time()+86400, '/');
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
