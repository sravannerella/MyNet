<?php
	if (isset($_POST['first'])==TRUE && isset($_POST['last'])==TRUE && isset($_POST['email'])==TRUE && isset($_POST['password'])==TRUE && isset($_POST['bdate'])==TRUE && isset($_POST['gender'])==TRUE) {
		$connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
		$first = $_POST['first'];
		$last = $_POST['last'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$gender = $_POST['gender'];
		$bdate = $_POST['bdate'];
		$querier = "INSERT INTO `Users` VALUES('','".$first."', '".$last."', '".$email."', NOW(),'".$gender ."', '".$bdate."', '".$password."')";
		$connection->query($querier);
	} 
?>