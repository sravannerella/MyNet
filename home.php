<?php
  include 'connect/connect.php';

  if(isset($_GET['profile'])==TRUE){
    $username = ucfirst($_GET['profile']);
    $querier = "SELECT * FROM `Users` WHERE first = '".$username."';";
    $results = $connection->query($querier);
    if(mysqli_num_rows($results) > 0){
      $row = mysqli_fetch_object($results);
      $first = $row->first;
      $last = $row->last;
      $birth = $row->birth_Date;
      $email = $row->email;

      $nquerier = "SELECT * FROM `location` WHERE email = '".$email."';";
      $queryResults = $connection->query($nquerier);
      $row = mysqli_fetch_object($queryResults);
      $city = $row->city;
      $state = $row->state;

      $sql = "SELECT * FROM `status` WHERE user_from = '". $email."';";
      $results = $connection->query($sql);

    } else{
      echo "<meta http-equiv=\"refresh\" content=\"0; url=http://areal.x10host.com/404.php\">";
    }
  }

  else if(!isset($_SESSION["email"])){
    echo "<meta http-equiv=\"refresh\" content=\"0; url=http://areal.x10host.com\">";
  } else{
    $email = $_SESSION["email"];
    $querier = "SELECT * FROM `Users` WHERE email = '".$email."';";
    $queryResults = $connection->query($querier);
    $row = mysqli_fetch_object($queryResults);
    $username = ucfirst($row->first);
    $first = $row->first;
    $last = $row->last;
    $birth = $row->birth_Date;

    $nquerier = "SELECT * FROM `location` WHERE email = '".$email."';";
    $queryResults = $connection->query($nquerier);
    $row = mysqli_fetch_object($queryResults);
    $city = $row->city;
    $state = $row->state;

    $sql = "SELECT * FROM `status` WHERE user_from = '". $email."';";
    $results = $connection->query($sql);
  }

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
         <h4 class="w3-center"><?php echo $username; ?>'s Profile</h4>
         <p class="w3-center"><img src="#" class="w3-circle" height="106" width="106" alt="Avatar"></p>
         <hr>
         <p ><i class="fa fa-pencil w3-margin-right w3-text-theme"></i> <?php echo ucfirst($first)." ".ucfirst($last); ?></p>
         <p><i class="fa fa-home w3-margin-right w3-text-theme"></i><?php echo ucfirst(strtolower($city)).", ".ucfirst(strtolower($state)); ?></p>
         <p><i class="fa fa-birthday-cake w3-margin-right w3-text-theme"></i> <?php echo $birth; ?></p>
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
    <div id="myPosts" name="myPosts" class="w3-col m7">
    
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
      
      <?php
        while($row = mysqli_fetch_object($results)){
          $status = $row->text;
          echo "
          <div class='w3-container w3-card-2 w3-white w3-round w3-margin'><br>
            <img src='' alt='Avatar' class='w3-left w3-circle w3-margin-right' height='106' width='106'>
            <span class='w3-right w3-opacity'>1 min</span>
            <h4>". ucfirst(strtolower($first))." ".ucfirst(strtolower($last)) ."</h4> 
            <hr class='w3-clear'>
            <p>". $status."</p>
            <button type='button' class='w3-btn w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i> Like</button> 
            <button type='button' class='w3-btn w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i> Comment</button> 
          </div>";
        }

      ?>
      
    <!-- End Middle Column -->
    </div>
    
    <!-- Right Column -->
    <div class="w3-col m2">
      
      <div class="w3-card-2 w3-round w3-white w3-center w3-dark-grey">
        <div class="w3-container">
          <p>Friend Request</p>
          <img src="" alt="Avatar" height="106" width="106"><br>
          <span>Suresh</span>
          <div class="w3-row">
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
        var email = '<?php echo $email;?>';
        $("#statusForm").unbind().submit(function(e){
          e.preventDefault();
          $.ajax({
            url: "connect/getContent.php",
            type: "POST",
            dataType: 'json',
            cache: false,
            data: {
              status: status,
              email: email
            },
            success: function(data){
              $("#status").val('');
              $("#myPosts").append("<div class='w3-container w3-card-2 w3-white w3-round w3-margin'><br><img src='' alt='Avatar' class='w3-left w3-circle w3-margin-right' height='106' width='106'><span class='w3-right w3-opacity'>1 min</span><h4>"+ data["first"] + " "+ data["last"] +"</h4> <hr class='w3-clear'><p>"+ data["result"] +"</p><button type='button' class='w3-btn w3-theme-d1 w3-margin-bottom'><i class='fa fa-thumbs-up'></i> Like</button> <button type='button' class='w3-btn w3-theme-d2 w3-margin-bottom'><i class='fa fa-comment'></i> Comment</button> </div>");
            },
            error: function(data){
              alert("failed");
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
