<?php
if(isset($_GET['ssl_id'])){
	$PageInfo = ['title'=>'View SSL #'.$_GET['ssl_id'],'rel'=>''];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/handler/CookieHandler.php';
	require_once __DIR__.'/handler/ValidationHandler.php';
	require_once __DIR__.'/handler/SSLHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	require_once __DIR__.'/includes/Sidebar.php';
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl` WHERE `ssl_key`='".$_GET['ssl_id']."' AND `ssl_for`='".$ClientInfo['hosting_client_key']."'");
	if(mysqli_num_rows($sql)>0){
		include __DIR__.'/template/ViewSSL.php';
	}
	else{
		include __DIR__.'/template/503.php';
	}
	require_once __DIR__.'/includes/Footer.php';
}
else{
	$PageInfo = ['title'=>'Unathorized Access','rel'=>''];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/handler/CookieHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	require_once __DIR__.'/includes/Sidebar.php';
	include __DIR__.'/template/503.php';
	require_once __DIR__.'/includes/Footer.php';
}
?>
