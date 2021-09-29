<?php
require __DIR__.'/../modules/autoload.php';
use \InfinityFree\MofhClient\Client;
if(isset($_POST['submit'])){
	$FormData = array(
		'domain' => $_POST['domain'],
	);
	$client = Client::create();
	$request = $client->availability(['domain' => $FormData['domain']]);
	$response = $request->send();
	if($response->isSuccessful()==0&&strlen($response->getMessage())>1){
		echo $response->getMessage();
		exit;
	}
	elseif($response->isSuccessful()==1&&$response->getMessage()==1){
		echo $FormData['domain'];
		exit;
	}
	elseif($response->isSuccessful()==0&&$response->getMessage()==0){
		echo 'Sorry! domain name already registered';
		exit;
	}
}
else{
	header('location: ../');
}
?>