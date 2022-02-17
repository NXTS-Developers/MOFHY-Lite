<?php
ob_start();
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
require __DIR__."/../../modules/Database/Config.php";
if(!isset($connect)){
	$connect = mysqli_connect(
		$DataBase['hostname'],
		$DataBase['username'],
		$DataBase['password'],
		$DataBase['name']
	);
	if(!$connect){
		echo 'Connection not established'; 
	} 
}

function get_mofhy_version(){
	return '1.0.6';
}
?>