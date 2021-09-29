<?php
include __DIR__.'/Connect.php';
require __DIR__.'/../../handler/SessionHandler.php';
require __DIR__.'/../../modules/autoload.php';
use \InfinityFree\MofhClient\Client;
if(isset($_POST['submit'])){
	$FormData = array(
		'old_password' => $_POST['old_password'],
		'new_password' => $_POST['new_password'],
		'account_key' => $_POST['account_key'],
		'account_username' => $_POST['account_username'],
		'account_password' => $_POST['account_password'],
	);
	if($FormData['old_password']==$FormData['account_password']){
		$client = Client::create();
		$request = $client->password([
		'username' => $FormData['account_key'],
		'password' => $FormData['new_password'],
		'enabledigest' => 1,
		]);
		$response = $request->send();
		$Data = $response->getData();
		$Result = array(
			'status' => $Data['passwd']['status'],
			'message' => $Data['passwd']['statusmsg'],
			'password' => $FormData['new_password']
		);
		if($Result['status']==0 && strlen($Result['message'])>1){
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  '.$Result['message'].'
									</div>';
			header('location: ../settings.php?account_id='.$FormData['account_username']);
			exit;
		}
		elseif($Result['status']==1 && strlen($Result['message'])>1){
			$sql = mysqli_query($connect,"UPDATE `hosting_account` SET `account_password`='".$Result['password']."' WHERE `account_username`='".$FormData['account_username']."'");
			if($sql){
				$_SESSION['message'] = '<div class="alert alert-success" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Password changed <b>successfully!</b>
										</div>';
				header('location: ../settings.php?account_id='.$FormData['account_username']);
				exit;
			}
			else{
				$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something went'."'".'s <b>wrong!</b>
										</div>';
				header('location: ../settings.php?account_id='.$FormData['account_username']);
				exit;
			}
		}
		elseif($Result['status']==0 && $Result['message']==0){
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../settings.php?account_id='.$FormData['account_username']);
			exit;
		}
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Invalid account <b>password!</b>
									</div>';
		header('location: ../settings.php?account_id='.$FormData['account_username']);
	}
}
else{
	header('location: ../');
}
?>