<?php
	include 'connect/connect.php';
	if(!isset($_SESSION["email"])){
    	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://areal.x10host.com\">";
  	}
?>

<link rel="stylesheet" type="text/css" href="css/jquery.emojipicker.css">
<link rel="stylesheet" type="text/css" href="css/jquery.emojipicker.a.css">
<link rel="stylesheet" type="text/css" href="css/jquery.emojipicker.a1.css">
<link rel="stylesheet" type="text/css" href="css/jquery.emojipicker.a2.css">
<link rel="stylesheet" type="text/css" href="css/jquery.emojipicker.a3.css">
<link rel="stylesheet" type="text/css" href="css/jquery.emojipicker.a4.css">

<div class="w3-container" style="margin-top:80px; margin-right: 5%; margin-left: 5%;">
	<div class="w3-quarter">
		<div class="w3-container" style="height: 850px; overflow: scroll;">
			<ul class="w3-ul w3-card">
			  <li class="w3-padding-hor-16 w3-hover-shadow">
			    <span onclick="this.parentElement.style.display='none'" 
			    class="w3-closebtn w3-padding w3-margin-right w3-small">x</span>
			    <img src="../images/image1.png" class="w3-left w3-circle w3-margin-right" style="width:50px; height: 50px">
			    <span class="w3-medium"><b>Mike</b></span><br>
    			<i style="font-size: 10px;">Last Seen 11:10AM</i>
			  </li>
			  <li class="w3-padding-hor-16 w3-hover-shadow">
			    <span onclick="this.parentElement.style.display='none'" 
			    class="w3-closebtn w3-padding w3-margin-right w3-small">x</span>
			    <img src="../images/image2.png" class="w3-left w3-circle w3-margin-right" style="width:50px; height: 50px">
			    <span class="w3-medium"><b>Jill</b></span><br>
    			<i style="font-size: 10px;">Last Seen 11:10AM</i>
			  </li>  
			  <li class="w3-padding-hor-16 w3-hover-shadow">
			    <span onclick="this.parentElement.style.display='none'" 
			    class="w3-closebtn w3-padding w3-margin-right w3-small">x</span>
			    <img src="../images/image3.png" class="w3-left w3-circle w3-margin-right" style="width:50px; height: 50px">
			    <span class="w3-medium"><b>Jane</b></span><br>
    			<i style="font-size: 10px;">Last Seen 11:10AM</i>
			  </li> 
			</ul>
		</div>
	</div>

	<div class="w3-rest">
		<div class="w3-container w3-padding-large w3-light-grey">
			<span class="w3-large">Mike</span>
			<div class="w3-right">
				<a href="#" id="delete"><i class="material-icons w3-padding-left" title="delete">delete</i></a>
				<a href="#" id="favorite"><i class="material-icons w3-padding-left" title="favorite">favorite</i></a>
			</div>
		</div>
		<div class="w3-container" id="messages" style="height: 700px; overflow: scroll;">
			<br>
			<?php
				$email = $_SESSION['email'];
				$query = "SELECT * FROM `conversations` WHERE user_from='".$email."' OR user_to= '". $email."' ;";
				$queryResults = $connection->query($query);
				$row = $queryResults->fetch_array(MYSQLI_BOTH);
				$id = $row['id'];
				$from = $row['user_from'];
				$to = $row['user_to'];

				include 'connect/getMsg.php';

			?>
		</div>

		<div class="w3-container w3-padding w3-light-grey">
			<div class="w3-row">
				<div class="w3-col" style="width:88%;">
					<textarea class="w3-input" id="message" type="text" style="resize: vertical; max-height: 200px;"></textarea>
				</div>
				<div class="w3-right">
					<a href="#" id="camera"><i class="material-icons" title="camera">camera_alt</i></a>
					<a href="#" id="sender"><i class="material-icons w3-padding sender" title="send Message">send</i></a>
					<a href="#" id="emotion"><i class="material-icons emojiable-option" title="emotions">insert_emoticon</i></a>
				</div>
			</div>
		</div>

	</div>
	
</div>

<script type="text/javascript" src="js/jquery.emojipicker.js"></script>
<script type="text/javascript" src="js/jquery.emojis.js"></script>

<script>

	setInterval("updateContent();", 1000 ); 
   	function updateContent() {
   		var email = '<?php echo $email;?>';
   		$.ajax({
   			url: "connect/getMsg.php",
   			type: "POST",
	        cache: false,
	        data: {
	            email: email
	        },
	        success: function(data){
	        	$('#messages').html(data);
	        },
	        error: function(data){
	        	alert("Failed");
	        }
   		});
    } 

	$(document).ready(function(e){
		$("#message").emojiPicker({
			height: '200px',
			button: false
		});

	});

	$("#emotion").click(function(e){
		e.preventDefault();
	    $('#message').emojiPicker('toggle');
	});


	$("#sender").click(function(){
		if( $("#message").val().length === 0 ) {
			$("#message").val('');
    	} else{
			var msg = $("#message").val();
			var user_from = '<?php echo $email; ?>';
			var user_to = '<?php echo $to; ?>';
			if(user_to == user_from){
				user_to = '<?php echo $from;?>';
			}
			var id = '<?php echo $id; ?>';

			$("#message").val('');

			$.ajax({
	            url: "connect/sendMsg.php",
	            type: "POST",
	            cache: false,
	            data: {
	              message: msg,
	              user_from: user_from,
	              user_to: user_to,
	              id: id
	            },
	            success: function(){
	              $("#message").val('');
	            },
	            error: function(){
	              alert("failed");
	            }
	        });

			msg = msg.replace(":)", '<img src="../images/emotions/smile.png">');
			msg = msg.replace(":D", '<img src="../images/emotions/laugh.png">');
			msg = msg.replace("<3", '<img src="../images/emotions/love.png">');
			msg = msg.replace(";p", '<img src="../images/emotions/winkTongue.png">');
			msg = msg.replace(";P", '<img src="../images/emotions/winkTongue.png">');

			$("#messages").append('<div class="w3-container"><div class="w3-right w3-round-xlarge w3-padding w3-blue w3-animate-bottom" style="max-width: 50%;">'+ msg +'</div></div><hr class="heightChange">');
		}
	});

	$("#message").keypress(function(e){
		if(e.which=='13'){
			if( $("#message").val().length === 0 ) {
				e.preventDefault();
    		} else{
				e.preventDefault();
				$("#sender").click();
			}
		}
	});
</script>

</body>
</html> 