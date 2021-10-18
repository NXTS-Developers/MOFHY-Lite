<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
require __DIR__.'/../handler/SSLHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
	'csr_commonname' => strtolower($_POST['domain']),
	'csr_organization' => $_POST['company'],
	'csr_department' => $_POST['department'],
	'csr_city' => $_POST['city'],
	'csr_state' => $_POST['state'],
	'csr_country' => $_POST['country'],
	'csr_email' => $_POST['email']
	);
	   $apiClient = new GoGetSSLApi();
	   $token = $apiClient->auth($SSLApi['api_username'],$SSLApi['api_password']);
	   $newOrder = $apiClient->generateCSR($FormData);
	if(isset($newOrder['error'])){
		echo "<hr>".$newOrder['description'];
	}
	else{
		echo '<hr><label>CSR Code:</label><pre><textarea class="form-control disabled mb-5" style="height:250px" readonly>'.$newOrder['csr_code'].'</textarea></pre><label>Private Key:</label><pre><textarea class="form-control disabled	" style="height:250px" readonly>'.$newOrder['csr_key'].'</textarea></pre>';
	}
}
?>