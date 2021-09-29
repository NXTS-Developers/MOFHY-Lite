<?php
if(isset($_GET['step'])){
	if($_GET['step']==1){
		$PageInfo = ['title'=>'Clientarea'];
	} elseif($_GET['step']==2){
		$PageInfo = ['title'=>'Register Admin'];
	} elseif($_GET['step']==3){
		$PageInfo = ['title'=>'Done'];
	}
}
else{
	$PageInfo = ['title'=>'Configration'];
}
require_once __DIR__.'/includes/Header.php';
if(isset($_GET['step'])){
	if($_GET['step']==1){
		include __DIR__.'/template/Step1.php';
	} elseif($_GET['step']==2){
		include __DIR__.'/template/Step2.php';
	} elseif($_GET['step']==3){
		include __DIR__.'/template/done.php';
	}
}
else{
	include __DIR__.'/template/Configration.php';
}
require_once __DIR__.'/includes/Footer.php';
?>