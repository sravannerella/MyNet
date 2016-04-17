<?php
  include 'connect/connect.php';

  if(!isset($_SESSION["email"])){
    echo "Why are you here?";
  } else{
    echo "Welcome";
  }
?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">

  <div class="w3-third w3-container">
    <br>
    <div class="w3-container w3-padding-0">
      <center><h3>A place to hangout with your friends and get in touch with new ones.</h3></center>
    </div>
    <br><br>
    <div class="w3-container w3-row-padding">
      <center>
        <i class="material-icons">swap_vert</i>
        <h4> Stay up to date with your friends </h4> 
        <i>using our Infotainment</i>
      </center>
    </div>
    <br><br>
    <div class="w3-container w3-row-padding">
      <center>
        <i class="material-icons">flight_takeoff</i>
        <h4> Share places and moments on the go </h4> 
        <i>using our Pic-N-Share</i>
      </center>
    </div>
    <br><br>
    <div class="w3-container w3-row-padding">
      <center>
        <i class="material-icons">explore</i>
        <h4> Explore more surprises inside</h4>
        <i>Join us</i>
      </center>
    </div>
  </div>

  <div class="w3-third">
    <div class="w3-container">
      
    </div>
  </div>

  <div class="w3-third">
    <br><br><br>
    <div class="w3-container w3-blue">
      <h2>Login</h2>
    </div>
    <form id="submitForm" class="w3-container w3-card-4">
      <div class="w3-group">      
        <label class="w3-label w3-text-blue">Email</label>
        <input class="w3-input w3-border" type="text" id="email" name="email" required>
      </div>
      <div class="w3-group">      
        <label class="w3-label w3-text-blue">Password</label>
        <input class="w3-input w3-border" type="password" name="password" id="password" required>
      </div>
      <br>
      <div class="w3-row">
        <div class="w3-third">
          <button id="loginButton" name="loginButton" class="w3-btn-block w3-teal">Login</button>
        </div>
        <div class="w3-third">
          <div class="w3-container">
            &nbsp;
          </div>
        </div>
        <div class="w3-third">
          <button id="registerButton" name="registerButton" class="w3-btn-block w3-light-green"> Register </button>
        </div>
      </div>
      <br>
    </form>
  </div>

</div>
<br><br>
<footer class="w3-container w3-leftbar w3-border-teal w3-theme-d3 w3-padding-hor-16">
  <p>AREAL - Created By Sravan Kumar and Suresh Padmanabhan</p>
</footer>

<script>
  $("#registerButton").click(function(){
    window.open("register.php","_self");
  });

  $("#loginButton").click(function(){
    var email = $("#email").val();
    var password = $("#password").val();
    $("#submitForm").unbind().submit(function(e){
      e.preventDefault();
      $.ajax({
        url: "connect/getContent.php",
        type: "POST",
        cache: false,
        dataType: 'json',
        data: {
          email: email,
          password: password
        },
        success: function(data){
          $("#submitForm").trigger("reset");
          if(data["result"] == "matched!"){
            //window.open("home.php", "_self");
            console.log(data["email"]);
            $.ajax({
              url: "connect/getSession.php",
              type: "POST",
              cache: false,
              data: {
                email: data["email"]
              },
              success: function(){
                window.open("home.php", "_self");
              }
            });
          }
        }
      });
    });
  });
</script>

<script type="text/javascript">
  function openNav() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else { 
        x.className = x.className.replace(" w3-show", "");
    }
}
</script>

</body>
</html> 
