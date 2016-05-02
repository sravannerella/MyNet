<?php
	if(isset($_POST['user_from'])==TRUE && isset($_POST['user_to'])==TRUE && isset($_POST['message'])==TRUE){

		$connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
		$from = mysqli_real_escape_string($connection, $_POST['user_from']);
		$to = mysqli_real_escape_string($connection, $_POST['user_to']);
		$msg = mysqli_real_escape_string($connection, $_POST['message']);

		$nquery = "SELECT * FROM `Users` WHERE first = '".$to."';";
		$queryResults = $connection->query($nquery);
		$row = $queryResults->fetch_array(MYSQLI_BOTH);
		$to = $row['email'];

		$query = "SELECT `id` FROM `conversations` WHERE (user_from= '".$to."' AND user_to= '".$from."') OR (user_from= '".$from."' AND user_to= '".$to."');";
		$queryResults = $connection->query($query);
		$nrow = $queryResults->fetch_array(MYSQLI_BOTH);
		$id = $nrow["id"];

		$connection->query("INSERT INTO `messages` VALUES('". $id."', '". $msg ."',NOW(), '". $from."', '".$to."');");
		$final = array('result' => 'success');
		echo json_encode($final);
	}
?>