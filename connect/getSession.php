<?php
	if(isset($_POST["email"])==TRUE){
		session_start();
		$_SESSION["email"] = $_POST["email"];
		echo "Connected";
	}
?>