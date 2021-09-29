<?php
$sql = mysqli_query($connect,"SELECT * FROM `hosting_area` WHERE `area_key`='AREA'");
$AreaInfo = mysqli_fetch_Assoc($sql);
if($AreaInfo['area_status']!=1){
	header('location: maintaince.php');
}
?>