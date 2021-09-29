<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
require __DIR__.'/../handler/SSLHandler.php';
if(isset($_POST['submit'])){
	if($ClientInfo['hosting_client_country']=='NULL'){
		$Country = 'PK';
	}
	else{
		$Country = ucwords($ClientInfo['hosting_client_country']);
	}
	if($ClientInfo['hosting_client_company']=='NULL'){
		$Company = 'Hostella';
	}
	else{
		$Company = $ClientInfo['hosting_client_company'];
	}
	if($ClientInfo['hosting_client_phone']=='NULL'){
		$Phone = '03094428355';
	}
	else{
		$Phone = $ClientInfo['hosting_client_phone'];
	}
	if($ClientInfo['hosting_client_city']=='NULL'){
		$City = 'Lahore';
	}
	else{
		$City = $ClientInfo['hosting_client_city'];
	}

	if($ClientInfo['hosting_client_pcode']=='NULL'){
		$Postal = '54000';
	}
	else{
		$Postal = $ClientInfo['hosting_client_pcode'];
	}
	$FormData = array(
		'product_id'       => 65,
		'csr' 			   => $_POST['csr'],
	    'server_count'     => "-1",
	    'period'           => 3,
	    'approver_email'   => 'mahtabhassan159@gmail.com',
	    'webserver_type'   => "1",
	    'admin_firstname'  => $ClientInfo['hosting_client_fname'],
	    'admin_lastname'   => $ClientInfo['hosting_client_lname'],
	    'admin_phone'      => $Phone,
	    'admin_title'      => "Mr",
	    'admin_email'      => $ClientInfo['hosting_client_email'],
	    'tech_firstname'   => $ClientInfo['hosting_client_fname'],
	    'tech_lastname'    => $ClientInfo['hosting_client_lname'],
	    'tech_phone'       => $Phone,
	    'tech_title'       => "Mr",
	    'tech_email'       => $ClientInfo['hosting_client_email'],
	    'org_name'         => $Company,
	    'org_division'     => "Hosting",
	    'org_addressline1' => $ClientInfo['hosting_client_address'],
	    'org_city'         => $City,
	    'org_country'      => $Country,
	    'org_phone'        => $Phone,
	    'org_postalcode'   => $Postal,
	    'org_region'       => "None",
	    'dcv_method'       => "dns",
	);
	echo "<pre>";
	print_r($FormData);
	$apiClient = new GoGetSSLApi();
	$token = $apiClient->auth($SSLApi['api_username'], $SSLApi['api_password']);
	$Data = $apiClient->addSSLOrder($FormData);
	if(count($Data)>4){
		$sql = mysqli_query($connect,"INSERT INTO `hosting_ssl`(`ssl_key`,`ssl_for`) VALUES ('".$Data['order_id']."','".$ClientInfo['hosting_client_key']."')");
		if($sql){
			$SSL = $AreaInfo['area_url'].'viewssl.php?ssl_id='.$FormData['order_id'];
			$EmailTo = [['email' => $FormData['email']],['email' => $AreaInfo['area_email']]];
			$Body = "
				<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
				<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
				<h2 style='text-align:center;color:skyblue;'><b>New SSL</b></h2><hr>
				<h3>Hi ".$ClientInfo['hosting_client_fname'].",</h3><p>You have successfully created a new ssl and you need to verify your domain using dns record in order to issue an ssl certificate.</p><br>
				<center><a href='".$SSL."' style='text-decoration:none;border:white;color:#fff;padding:10px 20px 10px 20px;background:orange;border-radius:5px;'>View SSL</a></center>
				<br>
				<p>After login to your account you can use any service ❤</p>
				<p>Regards ".$AreaInfo['area_name']."</p>
				<hr>
				<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
				</div>
				</div>";
			$Email = array(
				'subject' => 'New SSL #'.$FormData['order_id'],
				'body' => $Body
			);
			include __DIR__.'/../handler/EmailHandler.php';
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  SSL requested <b>successfully!</b>
										</div>';
			header('location: ../myssl.php');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something wemt'."'".' <b>weong!</b>
										</div>';
			header('location: ../newssl.php');
		}
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  '.$Data['message'].'
										</div>';
		header('location: ../newssl.php');
	}
}
else{
	header('location: ../');
}
?>