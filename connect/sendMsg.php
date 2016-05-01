<?php
	if(isset($_POST['user_from'])==TRUE && isset($_POST['user_to'])==TRUE && isset($_POST['message'])==TRUE && isset($_POST['id']) == TRUE){
		$connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
		$from = mysqli_real_escape_string($connection, $_POST['user_from']);
		$to = mysqli_real_escape_string($connection, $_POST['user_to']);
		$id = mysqli_real_escape_string($connection, $_POST['id']);
		$msg = mysqli_real_escape_string($connection, $_POST['message']);

		echo $user_from.' '.$user_to;

		$connection->query("INSERT INTO `messages` VALUES('". $id."', '". $msg ."',NOW(), '". $from."', '".$to."');");
		$final = array('result' => 'success');
		echo json_encode($final);
	}
?>