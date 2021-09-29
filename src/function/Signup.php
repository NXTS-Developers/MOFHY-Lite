<?php
require __DIR__.'/Connect.php';
require_once __DIR__.'/../handler/AreaHandler.php';
if(isset($_POST['signup'])){
	$FormData = array(
		'fname' => $_POST['first'],
		'lname' => $_POST['last'],
		'email' => $_POST['email'],
		'company' => 'NULL',
		'country' => 'NULL',
		'city' => 'NULL',
		'postal' => 'NULL',
		'address' => 'NULL',
		'phone' => 'NULL',
		'password' => sha1($_POST['password']),
		'date' => date('d-m-Y'),
		'key' => rand(000000,999999)
	);
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_clients` WHERE `hosting_client_email`='".$FormData['email']."' OR `hosting_client_key`='".$FormData['key']."'");
	if(mysqli_num_rows($sql)>0){
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
								  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								  Account already <b>exsits!</b> or invalid <b>token</b>
								</div>';
		header('location: ../login.php');
		exit;
	}
	else{
		$sql = mysqli_query($connect,"INSERT INTO `hosting_clients`(`hosting_client_fname`, `hosting_client_lname`, `hosting_client_email`, `hosting_client_phone`, `hosting_client_address`, `hosting_client_country`, `hosting_client_city`, `hosting_client_pcode`, `hosting_client_key`, `hosting_client_date`, `hosting_client_status`, `hosting_client_company`, `hosting_client_password`) VALUES ('".$FormData['fname']."','".$FormData['lname']."','".$FormData['email']."','".$FormData['phone']."','".$FormData['address']."','".$FormData['country']."','".$FormData['city']."','".$FormData['postal']."','".$FormData['key']."','".$FormData['date']."','0','".$FormData['company']."','".$FormData['password']."')");
			$Token = str_replace('$2y$10$', '', password_hash($FormData['key'], PASSWORD_DEFAULT));
			$EmailTo = [['email' => $FormData['email']]];
			$Body = "
				<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
				<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
				<h2 style='text-align:center;color:skyblue;'><b>Verify Email</b></h2><hr>
				<h3>Hi ".$FormData['fname'].",</h3><p>We'll like you to be a member of our service please copy the code from below inorder to verify your account.</p><br>
				<div style='margin:1rem;padding:1rem;background:rgb(230,230,230);overflow-x:auto;'>
					".$Token."
				</div>
				<br>
				<p>After login to your account you can use any service ❤</p>
				<p>Regards ".$AreaInfo['area_name']."</p>
				<hr>
				<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
				</div>
				</div>";
			$Email = array(
				'subject' => 'Verify Account',
				'body' => $Body
			);
			include __DIR__.'/../handler/EmailHandler.php';
		if($sql){
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Account created <b>successfully!</b>
									</div>';
			header('location: ../login.php');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../signup.php');
		}
	}
}
else{
	header('location: ../signup.php');
}
?>