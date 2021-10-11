<?php
require __DIR__.'/Connect.php';
require __DIR__.'/../handler/SessionHandler.php';
require_once __DIR__.'/../handler/AreaHandler.php';
if(isset($_POST['submit'])){
	$FormData = array(
		'id' => $_POST['id'],
		'subject' => $_POST['subject'],
		'content' => $_POST['editor']
	);
	$sql = mysqli_query($connect,"UPDATE `hosting_knowledgebase` SET `knowledgebase_subject`='".$FormData['subject']."',`knowledgebase_content`='".$FormData['content']."' WHERE `knowledgebase_id`='".$FormData['id']."'");
	if($sql){
		$_SESSION['message'] = '<div class="alert alert-success" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Knowledgebase updated <b>successfully!</b>
										</div>';
		header('location: ../editknowledgebase.php?knowledgebase_id='.$FormData['id']);
	}
	else{
		$_SESSION['message'] = '<div class="alert alert-danger" role="alert">
										  <button class="close" data-dismiss="alert" type="button" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  Something went'."'".'s <b>wrong!</b>
										</div>';
		header('location: ../editknowledgebase.php?knowledgebase_id='.$FormData['id']);
	}
}
else{
	header('location: ../');
}
?>