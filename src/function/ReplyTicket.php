<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
		'content' => str_rot13($_POST['editor']),
		'from' => $ClientInfo['hosting_client_key'],
		'for' => $_POST['ticket_id'],
		'date' => date('d-m-Y')
	);
	$sql = mysqli_query($connect,"UPDATE `hosting_tickets` SET `ticket_status`='2' WHERE `ticket_unique_id`='".$FormData['for']."'");
	if($sql){
		$sql = mysqli_query($connect,"INSERT INTO `hosting_ticket_replies`(`reply_for`,`reply_from`,`reply_content`,`reply_date`) VALUES ('".$FormData['for']."','".$FormData['from']."','".$FormData['content']."','".$FormData['date']."')");
		if($sql){
			$Ticket = $AreaInfo['area_url'].'viewticket.php?ticket_id='.$FormData['for'];
			$EmailTo = [['email' => $AreaInfo['area_email']]];
			$Body = "
				<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
				<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
				<h2 style='text-align:center;color:skyblue;'><b>Ticket Reply</b></h2><hr>
				<h3>Hi there,</h3><p>You have received a reply from ".$ClientInfo['hosting_client_fname'].".</p><br>
				<center><a href='".$Ticket."' style='text-decoration:none;border:white;color:#fff;padding:10px 20px 10px 20px;background:orange;border-radius:5px;'>View Ticket</a></center>
				<br>
				<p>After you login to your account you can use any service ❤</p>
				<p>Regards ".$AreaInfo['area_name']."</p>
				<hr>
				<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
				</div>
				</div>";
			$Email = array(
				'subject' => 'Ticket Reply #'.$FormData['for'],
				'body' => $Body
			);
			include __DIR__.'/../handler/EmailHandler.php';
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Reply added <b>successfully!</b>
									</div>';
			header('location: ../viewticket.php?ticket_id='.$FormData['for'].'#reply');
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../viewticket.php?ticket_id='.$FormData['for'].'#reply');
		}
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something went'."'".'s <b>wrong!</b>
										</div>';
		header('location: ../viewticket.php?ticket_id='.$FormData['for'].'#reply');
	}
}
else{
	header('location: ../');
}
?>