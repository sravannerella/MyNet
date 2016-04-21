<?php
  if(isset($_POST['username']) == TRUE && empty($_POST['username']) == FALSE){

    $connection = new mysqli("localhost", "arealx10", "Areal4Us", "arealx10_areal");
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $querier1 = $connection->query("SELECT `first`, `last` FROM `Users` WHERE first LIKE '%".$username."%' OR last LIKE '%".$username."%';");

    $counter = $querier1->num_rows;
    $output = "";
    if($counter == 0){
      $output = 'No Results';
      echo $output;
    }
    else{
      while($nrow = $querier1->fetch_array(MYSQLI_BOTH)){
        $last = $nrow["last"];
        $first = $nrow["first"];
        $output = '<a href="http://areal.x10host.com/'.$first.'">'. $first. ' '. $last .'</a>';
        echo $output;
      }
    }
  }
?>