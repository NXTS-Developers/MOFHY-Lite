<?php
if(isset($_COOKIE['LEFSESS'])){
	$data = json_decode(gzuncompress(base64_decode($_COOKIE['LEFSESS'])), true);
	$token = $data['token'];
	$email = $data['email'];
	$key = $data['key'];
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_clients` WHERE `hosting_client_email`='".$email."'");
	if(mysqli_num_rows($sql)>0){
		$ClientInfo = mysqli_fetch_assoc($sql);
		$verify = hash('sha256', json_encode([$email, $ClientInfo['hosting_client_key'], $key]));
		if(trim($token)! == trim($verify)){
			setcookie('LEFSESS', null ,-1,'/');
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
		setcookie('LEFSESS', null ,-1,'/');
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