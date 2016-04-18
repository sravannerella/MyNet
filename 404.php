<?php
	include 'connect/connect.php';
?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px"> 
	<h1>User not found!</h1>
	<button id="back" name="back" class="w3-btn w3-blue">Back to profile</button>
</div>

<script>
	$("#back").click(function(){
		window.open("home.php", "_self");
	})
</script>