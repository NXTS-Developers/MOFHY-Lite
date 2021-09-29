<?php
require_once __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
require_once __DIR__.'/../modules/autoload.php';
use \InfinityFree\MofhClient\Client;
if(isset($_POST['submit'])){
	$FormData = array(
		'username' => $_POST['account_username'],
		'key' => strtolower($_POST['account_key']),
		'reason' => $_POST['reason']
	);
	$client = Client::create();
	$request = $client->suspend([
	'username' => $FormData['key'],
	'reason' => $FormData['reason'],
	]);
	$response = $request->send();
	$Data = $response->getData();
	$Result = array(
		'status' => $Data['result']['status'],
		'message' => $Data['result']['statusmsg']
	);
	if($Result['status']==0 && !is_array($Result['message'])){
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  '.$Result['message'].'
									</div>';
		header('location: ../viewaccount.php?account_id='.$FormData['username']);
		exit;
	} elseif($Result['status']==1 && is_array($Result['message'])){
		$sql = mysqli_query($connect,"UPDATE `hosting_account` SET `account_status`='0' WHERE `account_username`='".$FormData['username']."'");
			if($sql){
			$EmailTo = [['email' => $ClientInfo['hosting_client_email']]];
			$Body = "
				<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
				<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
				<h2 style='text-align:center;color:skyblue;'><b>Account Deactivated</b></h2><hr>
				<h3>Hi ".$ClientInfo['hosting_client_fname'].",</h3><p>We had a good time with you while you were with us your account(".$FormData['username'].") have been deactivate successfully and all files and database will be deleted within 30 days.</p><br>
				<p>After login to your account you can use any service ❤</p>
				<p>Regards ".$AreaInfo['area_name']."</p>
				<hr>
				<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
				</div>
				</div>";
			$Email = array(
				'subject' => 'Deactivate Account',
				'body' => $Body
			);
			include __DIR__.'/../handler/EmailHandler.php';
				$_SESSION['message'] = '<div class="alert alert-success" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Accoutn deactivated <b>successfully!</b>
										</div>';
				header('location: ../viewaccount.php?account_id='.$FormData['username']);
				exit;
			}
			else{
				$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something went'."'".'s <b>wrong!</b>
										</div>';
				header('location: ../settings.php?account_id='.$FormData['username']);
				exit;
			}
	} elseif($Result['status']==0 && $Result['message']==0){
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
		header('location: ../settings.php?account_id='.$FormData['username']);
		exit;
	}
}
else{
	header('location: ../');
}
?>