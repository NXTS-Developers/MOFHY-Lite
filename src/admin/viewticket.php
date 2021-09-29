<?php
if(isset($_GET['ticket_id'])){
	$PageInfo = ['title'=>'View Ticket #'.$_GET['ticket_id'],'rel'=>''];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/handler/SessionHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	require_once __DIR__.'/includes/Sidebar.php';
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_tickets` WHERE `ticket_unique_id`='".$_GET['ticket_id']."'");
	include __DIR__.'/template/ViewTicket.php';
	require_once __DIR__.'/includes/Footer.php';
}
else{
	$PageInfo = ['title'=>'Unathorized Access'];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/handler/SessionHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	require_once __DIR__.'/includes/Sidebar.php';
	include __DIR__.'/../template/503.php';
	require_once __DIR__.'/includes/Footer.php';
}
?>