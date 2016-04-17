<?php
	if (isset($_POST['first'])==TRUE && isset($_POST['last'])==TRUE && isset($_POST['email'])==TRUE && isset($_POST['password'])==TRUE && isset($_POST['bdate'])==TRUE && isset($_POST['gender'])==TRUE) {
		$connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
		$first = mysqli_real_escape_string($connection, $_POST['first']);
		$last = mysqli_real_escape_string($connection, $_POST['last']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		$gender = mysqli_real_escape_string($connection, $_POST['gender']);
		$bdate = mysqli_real_escape_string($connection, $_POST['bdate']);
		$finalPass = md5($password);
		$querier = "INSERT INTO `Users` VALUES('','".$first."', '".$last."', '".$email."', NOW(),'".$gender ."', '".$bdate."', '".$finalPass."')";
		$connection->query($querier);
	} 
?>