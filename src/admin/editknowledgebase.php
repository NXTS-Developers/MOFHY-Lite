<?php
if(isset($_GET['knowledgebase_id'])){
	$PageInfo = ['title'=>'Edit Knowledgebase #'.$_GET['knowledgebase_id'],'rel'=>''];
	require_once __DIR__.'/includes/Connect.php';
	require_once __DIR__.'/handler/AreaHandler.php';
	require_once __DIR__.'/includes/Header.php';
	require_once __DIR__.'/handler/SessionHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	require_once __DIR__.'/includes/Sidebar.php';
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_knowledgebase` WHERE `knowledgebase_id`='".$_GET['knowledgebase_id']."'");
	if(mysqli_num_rows($sql)>0){
		include __DIR__.'/template/EditKnowledgebase.php';
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
	require_once __DIR__.'/handler/SessionHandler.php';
	require_once __DIR__.'/includes/Navbar.php';
	require_once __DIR__.'/includes/Sidebar.php';
	include __DIR__.'/template/503.php';
	require_once __DIR__.'/includes/Footer.php';
}
?>