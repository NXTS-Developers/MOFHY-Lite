<?php
require_once __DIR__.'/../handler/AreaHandler.php';
require_once __DIR__.'/../handler/HostingHandler.php';
$sql = mysqli_query($connect, "UPDATE `hosting_account` SET `account_status` = '1' WHERE `account_username` = '".$_POST['username']."'");
$sql1 = mysqli_query($connect, "SELECT `account_for` FROM `hosting_account` WHERE `account_username` = '".$_POST['username']."'");
$id = mysqli_fetch_assoc($sql1);
$sql2 = mysqli_query($connect, "SELECT * FROM `hosting_clients` WHERE `hosting_client_key` = '".$id['account_for']."'");
$ClientInfo = mysqli_fetch_assoc($sql2);
$sql3 = mysqli_query($connect, "SELECT * FROM `hosting_account` WHERE `account_username` = '".$_POST['username']."'");
$AccountInfo = mysqli_fetch_assoc($sql3);
$EmailTo = [['email' => $ClientInfo['hosting_client_email']]];
$Body = "
	<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
	<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
	<h2 style='text-align:center;color:skyblue;'><b>New Account</b></h2><hr>
	<h3>Hi ".$ClientInfo['hosting_client_fname'].",</h3><p>You have successfully created a new hosting account the details are given bellow.</p><br>
	<b>cPanel Username: </b><span>".$AccountInfo['account_username']."</span><br>
	<b>cPanel Password: </b><span>".$AccountInfo['account_password']."</span><br>
	<b>cPanel URL: </b><span>".$HostingApi['api_cpanel_url']."</span><br><br>
	<b>Main Domain: </b><span>".$AccountInfo['account_domain']."</span><br>
	<b>Account Date: </b><span>".$AccountInfo['account_date']."</span><br>
	<b>Server IP: </b><span>".$HostingApi['api_server_ip']."</span><br>
	<b>Hosting Package: </b><span>".$HostingApi['api_package']."</span><br><br>
	<b>FTP Username: </b><span>".$AccountInfo['account_username']."</span><br>
	<b>FTP Password: </b><span>".$AccountInfo['account_password']."</span><br>
	<b>FTP Hostname: </b><span>ftpupload.net</span><br>
	<b>FTP Port:</b><span>21</span><br><br>
	<b>MySQL Username: </b><span>".$AccountInfo['account_username']."</span><br>
	<b>MySQL Password: </b><span>".$AccountInfo['account_password']."</span><br>
	<b>MySQL Hostname: </b><span>".str_replace('cpanel', $AccountInfo['account_sql'], $HostingApi['api_cpanel_url'])."</span><br>
	<b>MySQL Port: </b><span>3306</span><br><br>
	<b>Nameserver 1: </b><span>".$HostingApi['api_ns_1']."</span><br>
	<b>Nameserver 2: </b><span>".$HostingApi['api_ns_2']."</span>
	<br>
	<p>After login to your account you can use any service ❤</p>
	<p>Regards ".$AreaInfo['area_name']."</p>
	<hr>
	<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
	</div>
	</div>";
$Email = array(
	'subject' => 'New Account',
	'body' => $Body
);
include __DIR__.'/../handler/EmailHandler.php';