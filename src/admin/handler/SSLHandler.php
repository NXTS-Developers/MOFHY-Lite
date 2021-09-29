<?php
require __DIR__.'/../../modules/GoGetSSL/GoGetSSLApi.php';
$sql = mysqli_query($connect,"SELECT * FROM `hosting_ssl_api` WHERE `api_key`='FREESSL'");
$SSLApi = mysqli_fetch_Assoc($sql);
?>