<?php
require_once __DIR__.'/../handler/AreaHandler.php';
$sql = mysqli_query($connect, "UPDATE `hosting_account` SET `account_status` = '2' WHERE `account_username` = '".$_POST['username']."'");
$event = mysqli_query($connect,"CREATE EVENT ".$_POST['username']."_delete ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 30 DAY DO DELETE FROM `hosting_account` WHERE `account_username`='".$_POST['username']."'");
$sql1 = mysqli_query($connect, "SELECT `account_for` FROM `hosting_account` WHERE `account_username` = '".$_POST['username']."'");
$id = mysqli_fetch_assoc($sql1);
$sql2 = mysqli_query($connect, "SELECT * FROM `hosting_clients` WHERE `hosting_client_key` = '".$id['account_for']."'");
$ClientInfo = mysqli_fetch_assoc($sql2);
$EmailTo = [['email' => $ClientInfo['hosting_client_email']]];
$Body = "
	<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
	<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
	<h2 style='text-align:center;color:skyblue;'><b>Account Deactivated</b></h2><hr>
	<h3>Hi ".$ClientInfo['hosting_client_fname'].",</h3><p>We had a good time with you while you were with us your account(".$_POST['username'].") have been deactivate successfully and all files and database will be deleted within 30 days.</p><br>
	<p>After login to your account you can use any service ❤</p>
	<p>Regards ".$AreaInfo['area_name']."</p>
	<hr>
	<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
	</div>
	</div>";
$Email = array(
	'subject' => 'Deactivate Account',
	'body' => $Body
);
include __DIR__.'/../handler/EmailHandler.php';