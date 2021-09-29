<?php
ob_start();
session_start();
require_once __DIR__."/../../modules/Database/Config.php";

$connect = mysqli_connect(
	$DataBase['hostname'],
	$DataBase['username'],
	$DataBase['password'],
	$DataBase['name']
);

if(!$connect){
	echo 'Connection not established'; 
}

?>