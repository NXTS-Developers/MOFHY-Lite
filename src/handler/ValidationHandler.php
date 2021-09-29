<?php
if($ClientInfo['hosting_client_status']=='0'){
	header('location: validate.php');
}
elseif($ClientInfo['hosting_client_status']=='2'){
	header('location: suspended.php');
}
?>