<?php
	if(isset($_POST['status']) == TRUE && empty($_POST['status']) == FALSE){

		$connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
		$status = $_POST['status'];
		$connection->query("INSERT INTO status VALUES('','". $status."', NOW())");
	}

	if(isset($_POST['email'])==TRUE && isset($_POST['password'])==TRUE){
		$connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);

		$finalPass = md5($password);
		$query = "SELECT `password` FROM Users WHERE email = '".$email ."';";

		$querier = $connection->query($query);
		$row = mysqli_fetch_object($querier);
		$pass = $row->password;
		if($finalPass == $pass){
			$result = "matched!";
		}

		$final = array('result' => $result, 'email'=> $email);
		echo json_encode($final);
	}
?>