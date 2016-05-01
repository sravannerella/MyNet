<?php
	if(isset($_POST['email'])==TRUE){
		$connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
		$email = $_POST['email'];
		$querier = "SELECT * FROM `messages` WHERE user_from = '".$email."' OR user_to = '".$email."';";
		$queryResults = $connection->query($querier);

		$counter = $queryResults->num_rows;
		$output = "";
		if($counter == 0){
			$output = 'Please start the conversation by saying hi';
			echo $output;
		}
		else{
			while($nrow = $queryResults->fetch_array(MYSQLI_BOTH)){
			    $from1 = $nrow["user_from"];
		        if(empty($from1)){
		        	$from1 = $email;
		        }
			    $to1 = $nrow["user_to"];
				$msg = $nrow["message"];
				$id = $nrow["id"];
				$msg = str_replace(':)', '<img src="../images/emotions/smile.png">', $msg);
				$msg = str_replace(':D', '<img src="../images/emotions/smile.png">', $msg);
				$msg = str_replace('<3', '<img src="../images/emotions/smile.png">', $msg);
				$msg = str_replace(';p', '<img src="../images/emotions/smile.png">', $msg);
				$msg = str_replace(';P', '<img src="../images/emotions/smile.png">', $msg);
				
				if($to1 == $email){
				    echo '<div class="w3-container"><div class="w3-left w3-round-xlarge w3-padding w3-grey" style="max-width: 50%;">'. $msg .'</div></div><hr class="heightChange">';
				}
				else{
				    echo '<div class="w3-container"><div class="w3-right w3-round-xlarge w3-padding w3-blue" style="max-width: 50%;">'. $msg .'</div></div><hr class="heightChange">';
				}
		  	}
		}
	}
?>