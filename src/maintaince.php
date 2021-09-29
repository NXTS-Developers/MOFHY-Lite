<?php
$PageInfo = ['title'=>'Maintaince','rel'=>'<link href="assets/css/login.css" rel="stylesheet" />'];
require_once __DIR__.'/includes/Connect.php';
$sql = mysqli_query($connect,"SELECT * FROM `hosting_area` WHERE `area_key`='AREA'");
$AreaInfo = mysqli_fetch_Assoc($sql);
if($AreaInfo['area_status']!=0){
	header('location: index.php');
}
require_once __DIR__.'/includes/Header.php';
include __DIR__.'/template/Maintaince.php';
require_once __DIR__.'/includes/Footer.php';
?>