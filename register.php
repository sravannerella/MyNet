<?php
  include 'connect/connect.php';
?>

<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
  <div class="w3-third">
    <div class="w3-container">
      
    </div>
  </div>

  <div class="w3-third">
  <div class="w3-container w3-blue">
    <h2>Register Now</h2>
  </div>
  <form id="submitForm" class="w3-container w3-card-4">
    <div class="w3-group">
      <label class="w3-label w3-text-blue">First Name</label>
      <input class="w3-input w3-border" type="text" name="first" id="first" required>
    </div>
    <div class="w3-group">      
      <label class="w3-label w3-text-blue">Last Name</label>
      <input class="w3-input w3-border" type="text" name="last" id="last" required>
    </div>
    <div class="w3-group">      
      <label class="w3-label w3-text-blue">Email</label>
      <input class="w3-input w3-border" type="text" id="email" name="email" required>
    </div>
    <div class="w3-group">      
      <label class="w3-label w3-text-blue">Password</label>
      <input class="w3-input w3-border" type="password" name="password" id="password" required>
    </div>
    <div class="w3-group">      
      <label class="w3-label w3-text-blue">Re-type Password</label>
      <input class="w3-input w3-border" type="password" name="retype" id="retype" required>
    </div>
    <div class="w3-group">      
      <label class="w3-label w3-text-blue">Birth Date</label>
      <input class="w3-input w3-border" type="date" name="bdate" id="bdate" required>
    </div>
    <div class="w3-group">
      <label class="w3-label w3-text-blue">City</label>
      <input class="w3-input w3-border" type="text" name="city" id="city" required>
    </div>
    <div class="w3-group">
      <label class="w3-label w3-text-blue">State</label>
      <input class="w3-input w3-border" type="text" name="state" id="state" required>
    </div>
    <div class="w3-row-padding">
      <label class="w3-checkbox w3-text-blue">
        <div class="w3-checkmark"></div> Male
        <input type="radio" name="gender" id="gender" value="male" checked>
      </label>
      <label class="w3-checkbox w3-text-blue">
        <div class="w3-checkmark"></div> Female
        <input type="radio" name="gender" id="gender" value="female">
      </label>
    </div>
    <br>
    <div class="w3-row">
      <button id="submitButton" name="submitButton" class="w3-btn w3-blue">Register</button>
    </div>
    <br>
  </form>
  </div>

  <div class="w3-third">
    <div class="w3-container">
      
    </div>
  </div>

</div>
<br><br>
<footer class="w3-container w3-theme-d3 w3-padding-hor-16">
  <p>AREAL - Created By Sravan Kumar and Suresh Padmanabhan</p>
</footer>

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

<script>
    $("#submitButton").click(function(){
      alert("Registering");
      var first = $("#first").val();
      var last = $("#last").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var retype = $("#retype").val();
      var gender = $("#gender").val();
      var bdate = $("#bdate").val();
      var city = $("#city").val();
      var state = $("#state").val();
      $("#submitForm").unbind().submit(function(e){
        e.preventDefault();
        var call = $.ajax({
          url: "connect/getRegister.php",
          type: "POST",
          cache: false,
          dataType: 'json',
          data: {
            first: first,
            last: last,
            email: email,
            password: password,
            gender: gender,
            bdate: bdate,
            city: city,
            state: state,
            retype: retype
          },
          success: function(data){
            if(data["result"]=="matched!"){
              alert("Registeration success");
              $("#submitForm").trigger("reset");
            } else{
              alert("Passwords are not matching");
            }
          }
        });
        console.log(call);
      });
    });
</script>

</body>
</html>