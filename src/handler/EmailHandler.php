<?php
require_once __DIR__.'/../includes/Connect.php';
require_once __DIR__.'/AreaHandler.php';
require __DIR__.'/../modules/phpmailer/PHPMailerAutoload.php'; 
$sql = mysqli_query($connect,"SELECT * FROM `hosting_smtp` WHERE `smtp_key`='SMTP'");
$SMTP = mysqli_fetch_assoc($sql);
$mail = new PHPMailer;
$mail->SMTPDebug = false;
$mail->isSMTP();
$mail->Host = $SMTP['smtp_host'];
$mail->SMTPAuth = true;
$mail->Username = $SMTP['smtp_username'];
$mail->Password = $SMTP['smtp_password'];
$mail->SMTPSecure = 'tls';
$mail->Port = $SMTP['smtp_port'];
$mail->From = $SMTP['smtp_from'];
$mail->FromName = $AreaInfo['area_name'];
foreach($EmailTo as $EmailFor){
 	$mail->addAddress($EmailFor['email']);
 } 
$mail->addReplyTo($SMTP['smtp_username'],$AreaInfo['area_name']);
$mail->WordWrap = 10000;
$mail->isHTML(true);
$mail->Subject = $Email['subject'];
$mail->Body = $Email['body'];
$mail->send();
?>
