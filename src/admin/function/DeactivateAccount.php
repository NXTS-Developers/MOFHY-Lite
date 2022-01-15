<?php
require_once __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
require_once __DIR__.'/../modules/autoload.php';
use \InfinityFree\MofhClient\Client;
if(isset($_POST['submit'])){
	$FormData = array(
		'username' => mysqli_real_escape_string($connect, $_POST['account_username']),
		'key' => mysqli_real_escape_string($connect, strtolower($_POST['account_key'])),
		'reason' => mysqli_real_escape_string($connect, 
		$_POST['reason'])
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
		$sql = mysqli_query($connect,"UPDATE `hosting_account` SET `account_status`='0' WHERE `account_username`='".$FormData['username']."'");// set 0 to 4 to if you are using premium hosting
		//$event = mysqli_query($connect,"CREATE EVENT ".$FormData['username']."_update ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 3 MINUTE DO UPDATE `hosting_account` SET `account_status`=0 WHERE `account_username`='".$FormData['username']."'");
		//$event2 = mysqli_query($connect,"CREATE EVENT ".$FormData['username']."_delete ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY DO DELETE FROM `hosting_account` WHERE `account_username`='".$FormData['username']."'");
			if($sql){
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