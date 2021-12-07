<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
		'subject' => $connect->real_escape_string($_POST['subject']),
		'content' => $connect->real_escape_string($_POST['editor']),
		'date' => date('d-m-Y')
	);
	$sql = mysqli_query($connect,"INSERT INTO `hosting_knowledgebase`(`knowledgebase_subject`,`knowledgebase_date`,`knowledgebase_content`) VALUES ('".$FormData['subject']."','".$FormData['date']."','".$FormData['content']."')");
	if($sql){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Knowledgebase added <b>successfully!</b>
										</div>';
		header('location: ../newknowledgebase.php');
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something went'."'".'s <b>wrong!</b>
										</div>';
		header('location: ../newknowledgebase.php');
	}
}
else{
	header('location: ../');
}
?>
