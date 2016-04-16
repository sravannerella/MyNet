<?php
	if(isset($_POST['status']) == TRUE && empty($_POST['status']) == FALSE){

		$connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
		$status = $_POST['status'];
		$connection->query("INSERT INTO status VALUES('','". $status."', NOW())");
	}
?>