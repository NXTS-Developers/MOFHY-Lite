<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/CookieHandler.php';
if(isset($_GET['ticket_id'])){
	$sql = mysqli_query($connect,"UPDATE `hosting_tickets`SET `ticket_status`=3 WHERE `ticket_unique_id`='".mysqli_real_escape_string($connect, $_GET['ticket_id'])."'");
	if($sql){
			$sql1 = mysqli_query($connect, "SELECT `ticket_email` FROM `hosting_tickets` WHERE `ticket_unique_id` = '".$_POST['ticket_id']."'");
			$Email = mysqli_fetch_assoc($sql1);
			$EmailTo = [['email' => $Email['ticket_email']]];
			$Body = "
				<div class='container' style='margin-left:5%;margin-right:5%;margin-top:5%;'>
				<div style='border-radius:1px solid grey;border-radius:5px;box-shadow:1px 1px 5px grey;padding:20px;font-family: Arial, Helvetica, sans-serif;'>
				<h2 style='text-align:center;color:skyblue;'><b>Ticket Closed</b></h2><hr>
				<h3>Hi there,</h3><p>the ticket('".$_GET['ticket_id']."') had been closed.</p><br>
				<br>
				<p>After login to your account you can use any service ❤</p>
				<p>Regards ".$AreaInfo['area_name']."</p>
				<hr>
				<h4 style='text-align:center;'><b>Need our help?</b></h4><p style='text-align:center'><a href='".$AreaInfo['area_url']."newticket.php' style='color:skyblue;text-decoration:none;margin:0;'>We are here to help you out!</a></p>
				</div>
				</div>";
			$Email = array(
				'subject' => 'Ticket Closed ',
				'body' => $Body
			);
			include __DIR__.'/../handler/EmailHandler.php';
			$_SESSION['message'] = '<div class="alert alert-success" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Ticket closed <b>successfully!</b>
									</div>';
			header('location: ../viewticket.php?ticket_id='.$_GET['ticket_id']);
		}
		else{
			$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
									  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									  Something went'."'".'s <b>wrong!</b>
									</div>';
			header('location: ../viewticket.php?ticket_id='.$_GET['ticket_id']);
		}
	}
else{
	header('location: ../login.php');
}
?>