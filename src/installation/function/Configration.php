<?php
ob_start();
session_start();
if(isset($_POST['submit'])){
	$fh = fopen(__DIR__.'/../../modules/Database/Config.php', 'w');
	fwrite($fh, chr(60) . "?php\n");
	fwrite($fh, sprintf('$DataBase = array('."\n"));
	fwrite($fh, sprintf("\t".'"hostname" => '.'"'.$_POST['hostname'].'",'."\n"));
	fwrite($fh, sprintf("\t".'"username" => '.'"'.$_POST['username'].'",'."\n"));
	fwrite($fh, sprintf("\t".'"password" => '.'"'.$_POST['password'].'",'."\n"));
	fwrite($fh, sprintf("\t".'"name" => '.'"'.$_POST['name'].'"'."\n"));
	fwrite($fh, sprintf(');'."\n"));
	fwrite($fh, sprintf('?>'));
	fclose($fh);
	include __DIR__."/../../modules/Database/Config.php";
	$connect = mysqli_connect(
	$DataBase['hostname'],
	$DataBase['username'],
	$DataBase['password'],
	$DataBase['name']
	);
	if(!$connect){
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Can'."'".'t connect to <b>database!</b>
									</div>';
		header('location: ../install.php');
	}
	else{
		include __DIR__."/Database.php";
		if($sql){
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Connection established <b>successfully!</b>
									</div>';
			header('location: ../install.php?step=1');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../install.php');
		}
		
	}
}
?>