<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
require_once __DIR__.'/../modules/autoload.php';
use \InfinityFree\MofhClient\Client;
if(isset($_POST['submit'])){
	$FormData = array(
		'username' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'),0,8),
		'password' => substr(str_shuffle('qwertyuioplkjhgfdsazxcvbnm012345789QWERTYUIOPLKJHGFDSAZXCVBNM'),0,16),
		'domain' => $_POST['domain'],
		'email' => $ClientInfo['hosting_client_email'],
		'plan' => $_POST['package']
	);
	if(empty($FormData['domain'])){
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Domain cannot be <b>empty!</b>
									</div>';
		header('location: ../newaccount.php');
	}
	else{
		$sql = mysqli_query($connect,"SELECT * FROM `hosting_account` WHERE `account_for`='".$ClientInfo['hosting_client_key']."'");
		if(mysqli_num_rows($sql)<3){
			$client = Client::create();
			$request = $client->createAccount([
			'username' => $FormData['username'],
			'password' => $FormData['password'],
			'domain' => $FormData['domain'],
			'email' => $FormData['email'],
			'plan' => $FormData['plan']
			]);
			$response = $request->send();
			$Data = $response->getData();
			$Result = array(
				'username' => $Data['result']['options']['vpusername'],
				'message' => $Data['result']['statusmsg'],
				'status' => $Data['result']['status'],
				'domain' => str_replace('cpanel', strtolower($FormData['username']), API_CPANEL_URL),
				'date' => date('d-m-Y')
			);
			if($Result['status']==0 && strlen($Result['message'])>1){
				$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  '.$Result['message'].'
										</div>';
				header('location: ../newaccount.php');
				exit;
			}
			elseif($Result['status']==1 && strlen($Result['message'])>1){
				$sql = mysqli_query($connect,"INSERT INTO `hosting_account`(`account_username`, `account_password`, `account_key`, `account_domain`, `account_status`, `account_date`, `account_for`) VALUES ('".$Result['username']."','".$FormData['password']."','".$FormData['username']."','".$Result['domain']."','1','".$Result['date']."','".$ClientInfo['hosting_client_key']."')");
				if($sql){
					$EmailTo = [['email' => $FormData['email']]];
					$Body = "
						<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
						<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
						<h2 style='text-align:center;color:skyblue;'><b>New Account</b></h2><hr>
						<h3>Hi ".$ClientInfo['hosting_client_fname'].",</h3><p>Congratulations! You have successfully created a new free hosting account. More details are given below:</p><br>
						<b>cPanel Username: </b><span>".$Result['username']."</span><br>
						<b>cPanel Password: </b><span>".$FormData['password']."</span><br>
						<b>Main Domain: </b><span>".$Result['domain']."</span><br>
						<b>Account Date: </b><span>".$Result['date']."</span><br>
						<b>cPanel URL: </b><span>".API_CPANEL_URL."</span><br>
						<b>Server IP: </b><span>".API_SERVER_IP."</span><br>
						<b>Hosting Package: </b><span>".API_PLAN."</span><br>
						<b>FTP Hostname: </b><span>ftpupload.net</span><br>
						<b>MySQL Hostname: </b><span>".str_replace('cpanel', 'sqlxxx', API_CPANEL_URL)."</span><br>
						<b>Nameserver 1: </b><span>".API_NS_1."</span><br>
						<b>Nameserver 2: </b><span>".API_NS_2."</span>
						<br>
						<p>Next, login to your account and you can use any service ❤!</p>
						<p>Regards,<br> </b>".$AreaInfo['area_name']."</b>.</p>
						<hr>
						<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
						</div>
						</div>";
					$Email = array(
						'subject' => 'New Hosting Account',
						'body' => $Body
					);
					include __DIR__.'/../handler/EmailHandler.php';
					$_SESSION['message'] = '<div class="alert alert-success" role="alert">
											  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											  Account created <b>successfully</b>!
											</div>';
					header('location: ../myaccounts.php');
					exit;
				}
				else{
					$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
											  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											  Something went'."'".'s <b>wrong!</b>
											</div>';
					header('location: ../newaccount.php');
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
				header('location: ../myaccounts.php');
				exit;
			}
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Free account limit <b>reached!</b>
									</div>';
			header('location: ../myaccounts.php');
		}
	}
}
else{
	header('location: ../');
}
?>
