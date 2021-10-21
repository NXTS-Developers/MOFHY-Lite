<?php
require __DIR__.'/../includes/Connect.php';
$sql = mysqli_query($connect,"SELECT * FROM `hosting_account_api` WHERE `api_key`='MOFHAPI'");
$HostingApi = mysqli_fetch_Assoc($sql);
?>
