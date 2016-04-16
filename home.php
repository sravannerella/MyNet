<?php
  include 'connect/connect.php';
?>

<!-- Page Container -->
<div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">    
  <!-- The Grid -->
  <div class="w3-row">
    <!-- Left Column -->
    <div class="w3-col m3">
      <!-- Profile -->
      <div class="w3-card-2 w3-round w3-white">
        <div class="w3-container">
         <h4 class="w3-center">My Profile</h4>
         <p class="w3-center"><img src="#" class="w3-circle" height="106" width="106" alt="Avatar"></p>
         <hr>
         <p><i class="fa fa-pencil w3-margin-right w3-text-theme"></i> NAME</p>
         <p><i class="fa fa-home w3-margin-right w3-text-theme"></i> CITY, STATE</p>
         <p><i class="fa fa-birthday-cake w3-margin-right w3-text-theme"></i> MONTH DATE, YEAR</p>
        </div>
      </div>
      <br>

      <!-- Interests --> 
      <div class="w3-card-2 w3-round w3-white w3-hide-small">
        <div class="w3-container">
          <p>Interests</p>
          <p>
            <span class="w3-tag w3-small w3-theme-d5">News</span>
            <span class="w3-tag w3-small w3-theme-d4">W3Schools</span>
            <span class="w3-tag w3-small w3-theme-d3">Labels</span>
            <span class="w3-tag w3-small w3-theme-d2">Games</span>
            <span class="w3-tag w3-small w3-theme-d1">Friends</span>
            <span class="w3-tag w3-small w3-theme">Games</span>
            <span class="w3-tag w3-small w3-theme-l1">Friends</span>
            <span class="w3-tag w3-small w3-theme-l2">Food</span>
            <span class="w3-tag w3-small w3-theme-l3">Design</span>
            <span class="w3-tag w3-small w3-theme-l4">Art</span>
            <span class="w3-tag w3-small w3-theme-l5">Photos</span>
          </p>
        </div>
      </div>
      <br>
      
      <!-- Accordion -->
      <div class="w3-card-2 w3-round">
        <div class="w3-accordion w3-white">
          <button onclick="myFunction('Demo1')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-circle-o-notch w3-margin-right"></i> My Groups</button>
          <div id="Demo1" class="w3-accordion-content w3-container">
            <p>Some text..</p>
          </div>
          <button onclick="myFunction('Demo2')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-calendar-check-o w3-margin-right"></i> My Events</button>
          <div id="Demo2" class="w3-accordion-content w3-container">
            <p>Some other text..</p>
          </div>
          <button onclick="myFunction('Demo3')" class="w3-btn-block w3-theme-l1 w3-left-align"><i class="fa fa-users w3-margin-right"></i> My Photos</button>
          <div id="Demo3" class="w3-accordion-content w3-container">
         <div class="w3-row-padding">
         <br>
           <div class="w3-half ">
             <img src="#" height="106" width="106" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="#" height="106" width="106" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="#" height="106" width="106" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="#" height="106" width="106" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="#" height="106" width="106" class="w3-margin-bottom">
           </div>
           <div class="w3-half">
             <img src="#" height="106" width="106" class="w3-margin-bottom">
           </div>
         </div>
          </div>
        </div>      
      </div>
      <br>
      
      <!-- Alert Box -->
      <div class="w3-container w3-round w3-theme-l4 w3-border w3-theme-border w3-margin-bottom w3-hide-small">
        <span onclick="this.parentElement.style.display='none'" class="w3-hover-text-grey w3-closebtn">
          <i class="fa fa-remove"></i>
        </span>
        <p><strong>Hey!</strong></p>
        <p>People are looking at your profile. Find out who.</p>
      </div>
    
    <!-- End Left Column -->
    </div>
    
    <!-- Middle Column -->
    <div class="w3-col m7">
    
      <div class="w3-row-padding">
        <div class="w3-col m12">
          <div class="w3-card-2 w3-round w3-white">
            <div class="w3-container w3-padding">
              <h6 class="w3-opacity">Status:</h6>
              <form class="w3-container" id="statusForm">
                  <input class="w3-input w3-animate-input" type="text" id="status" name="status" placeholder="Share your feelings:" style="width:70%">
                  <br>
                  <button class="w3-btn w3-theme" id="submitPost" name="submitPost"><i class="fa fa-pencil"></i> Post</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      
      <div class="w3-container w3-card-2 w3-white w3-round w3-margin"><br>
        <img src="" alt="Avatar" class="w3-left w3-circle w3-margin-right" height="106" width="106">
        <span class="w3-right w3-opacity">1 min</span>
        <h4>Suresh Padmanabhan</h4> 
        <hr class="w3-clear">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          <div class="w3-row-padding" style="margin:0 -16px">
            <div class="w3-half">
              <img src="#" height="106" width="100%" alt="Northern Lights" class="w3-margin-bottom">
            </div>
            <div class="w3-half">
              <img src="#" height="106" width="100%" alt="Nature" class="w3-margin-bottom">
          </div>
        </div>
        <button type="button" class="w3-btn w3-theme-d1 w3-margin-bottom"><i class="fa fa-thumbs-up"></i> Like</button> 
        <button type="button" class="w3-btn w3-theme-d2 w3-margin-bottom"><i class="fa fa-comment"></i> Comment</button> 
      </div>
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      
      <div class="w3-card-2 w3-round w3-white w3-center">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="" alt="Avatar" height="106" width="106"><br>
          <span>Suresh</span>
          <div class="w3-row w3-opacity">
            <div class="w3-half">
              <button class="w3-btn w3-green w3-btn-block w3-section" title="Accept"><i class="fa fa-check"></i></button>
            </div>
            <div class="w3-half">
              <button class="w3-btn w3-red w3-btn-block w3-section" title="Decline"><i class="fa fa-remove"></i></button>
            </div>
          </div>
        </div>
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-padding-hor-16 w3-center">
        <p>ADS</p>
      </div>
      <br>
      
      <div class="w3-card-2 w3-round w3-white w3-padding-hor-32 w3-center">
        <p>ADS</p>
      </div>
      <br>

      <div class="w3-card-2 w3-round w3-white w3-padding-hor-32 w3-center">
        <p>ADS</p>
      </div>
      
    <!-- End Right Column -->
    </div>
    
  <!-- End Grid -->
  </div>
  
<!-- End Page Container -->
</div>
<br>

<!-- Footer -->
<footer class="w3-container w3-theme-d3 w3-padding-hor-16">
  <p>AREAL - Created By Sravan Kumar and Suresh Padmanabhan</p>
</footer>


<script>
    //Submitting the status
    $("#submitPost").click(function(){
        var status = $("#status").val();
        $("#statusForm").unbind().submit(function(e){
          e.preventDefault();
          $.ajax({
            url: "connect/getContent.php",
            type: "POST",
            cache: false,
            data: {
              status: status
            },
            success: function(data){
              $("#status").val('');
            }
          });
        });
    });
</script>

<script>
// Accordion
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
        x.previousElementSibling.className += " w3-theme-d1";
    } else { 
        x.className = x.className.replace("w3-show", "");
        x.previousElementSibling.className = 
        x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
}

// Used to toggle the menu on smaller screens when clicking on the menu button
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
