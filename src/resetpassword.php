<?php
if(isset($_COOKIE['LEFSESS'])&&$_COOKIE['LEFSESS']!='NULL'){
	header('location: index.php');	
}
$PageInfo = ['title'=>'Reset Password','rel'=>'<link href="assets/css/login.css" rel="stylesheet" />'];
require_once __DIR__.'/includes/Connect.php';
require_once __DIR__.'/handler/AreaHandler.php';
require_once __DIR__.'/includes/Header.php';
include __DIR__.'/template/ResetPassword.php';
require_once __DIR__.'/includes/Footer.php';
?>