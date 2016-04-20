<?php
	if(isset($_POST['status']) == TRUE && empty($_POST['status']) == FALSE && isset($_POST['email'])==TRUE && isset($_POST['email2'])==TRUE ){

		$connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
		$status = mysqli_real_escape_string($connection, $_POST['status']);
		$email = $_POST['email'];
		$email2 = $_POST['email2'];
		$connection->query("INSERT INTO `status` VALUES('','". $status."', NOW(), '". $email."', '".$email2."')");

		$querier1 = $connection->query("SELECT `first`, `last` FROM Users WHERE email = '". $email."';");
		$row = mysqli_fetch_object($querier1);
		$last = $row->last;
		$first = $row->first;
		$final = array('result' => $status, 'first' => $first, 'last' => $last);
		echo json_encode($final);
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
		}else{
			$result = "failed";
		}

		$final = array('result' => $result, 'email'=> $email);
		echo json_encode($final);
	}
?>