<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
		'email' => mysqli_real_escape_string($connect, $_POST['email']),
		'subject' => $connect->real_escape_string(str_rot13($_POST['subject'])),
		'content' => $connect->real_escape_string(str_rot13($_POST['editor'])),
		'department' => $_POST['department'],
		'for' => $ClientInfo['hosting_client_key'],
		'unique_id' => rand(000000,999999),
		'date' => date('d-m-Y'),
		'status' => 0
	);
	$sql = mysqli_query($connect,"SELECT * FROM `hosting_tickets` WHERE `ticket_unique_id`='".$FormData['unique_id']."'");
	if(mysqli_num_rows($sql)>0){
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
		header('location: ../mytickets.php');
	}
	else{
		$sql = mysqli_query($connect,"INSERT INTO `hosting_tickets`(`ticket_unique_id`,`ticket_subject`,`ticket_email`,`ticket_department`,`ticket_content`,`ticket_status`,`ticket_date`,`ticket_for`) VALUES ('".$FormData['unique_id']."','".$FormData['subject']."','".$FormData['email']."','".$FormData['department']."','".$FormData['content']."','".$FormData['status']."','".$FormData['date']."','".$FormData['for']."')");
		if($sql){
			$Ticket = $AreaInfo['area_url'].'viewticket.php?ticket_id='.$FormData['unique_id'];
			$EmailTo = [['email' => $FormData['email']],['email' => $AreaInfo['area_email']]];
			$Body = "
				<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
				<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
				<h2 style='text-align:center;color:skyblue;'><b>New Ticket</b></h2><hr>
				<h3>Hi ".$ClientInfo['hosting_client_fname'].",</h3><p>You have opened a support ticket which will be processed soon. It can take up to 2 hours.</p><br>
				<center><a href='".$Ticket."' style='text-decoration:none;border:white;color:#fff;padding:10px 20px 10px 20px;background:orange;border-radius:5px;'>View Ticket</a></center>
				<br>
				<p>After you login to your account you can use any service ❤</p>
				<p>Regards ".$AreaInfo['area_name']."</p>
				<hr>
				<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
				</div>
				</div>";
			$Email = array(
				'subject' => 'New Ticket #'.$FormData['for'],
				'body' => $Body
			);
			include __DIR__.'/../handler/EmailHandler.php';
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Ticket added <b>successfully!</b>
										</div>';
			header('location: ../mytickets.php');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something went'."'".'s <b>wrong!</b>
										</div>';
			header('location: ../mytickets.php');
		}
	}
}
else{
	header('location: ../');
}
?>
