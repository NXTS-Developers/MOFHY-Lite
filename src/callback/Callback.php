<?php
include __DIR__.'/../includes/Connect.php';
if(isset($_POST['comments'])){
	if(substr($_POST['status'],0,3) == 'sql'){
		include __DIR__.'/SQLHost.php';
		include __DIR__.'/Activate.php';
	}
	elseif($_POST['status'] == 'SUSPENDED'){
		include __DIR__.'/Suspend.php';
	}
}