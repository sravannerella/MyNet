<?php
	if (isset($_POST['first'])==TRUE && isset($_POST['last'])==TRUE && isset($_POST['email'])==TRUE && isset($_POST['password'])==TRUE && isset($_POST['bdate'])==TRUE && isset($_POST['gender'])==TRUE && isset($_POST['city'])==TRUE && isset($_POST['state'])==TRUE && isset($_POST['retype'])==TRUE) {
		$connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
		$first = mysqli_real_escape_string($connection, $_POST['first']);
		$last = mysqli_real_escape_string($connection, $_POST['last']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		$retype = mysqli_real_escape_string($connection, $_POST['retype']);
		$gender = mysqli_real_escape_string($connection, $_POST['gender']);
		$bdate = mysqli_real_escape_string($connection, $_POST['bdate']);
		$city = mysqli_real_escape_string($connection, $_POST['city']);
		$state = mysqli_real_escape_string($connection, $_POST['state']);

		if($password == $retype){
			$finalPass = md5($password);
			$querier = "INSERT INTO `Users` VALUES('','".$first."', '".$last."', '".$email."', NOW(),'".$gender ."', '".$bdate."', '".$finalPass."')";
			$querier2 = "INSERT INTO `location` VALUES('".$email."', '".$city."','".$state."')";
			$connection->query($querier);
			$connection->query($querier2);
			$result = "matched!";
		} else{
			$result = "Passwords do not match";
		}
		$final = array('result' => $result);
		echo json_encode($final);
	} 
?>