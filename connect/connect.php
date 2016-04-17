<?php
	$host = "localhost";
	$user = "arealx10";
	$password = "Areal4Us";
  $db = "arealx10_areal";
	
	$connection = mysqli_connect($host, $user, $password, $db);
	if($connection->connect_error){
		die("Couldn't connect");
	}

  session_start();
  if($_SESSION["email"]){
    $user = $_SESSION["email"];
  }
  else{
    $user = "";
  }
?>

<!DOCTYPE html>
<html>
<title>AREAL - Place to Hangout</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="css/customStyle.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
</style>
<body class="w3-theme-l5">

<!-- Navbar -->
<div class="w3-top">
 <ul class="w3-navbar w3-theme-d2 w3-left-align w3-large">
  <li class="w3-hide-medium w3-hide-large w3-opennav w3-right">
    <a class="w3-padding-large w3-hover-white w3-large w3-theme-d2" href="javascript:void(0);" onclick="openNav()"><i class="fa fa-bars"></i></a>
  </li>
  <li><a href="#" class="w3-padding-large w3-hover-black w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>AREAL</a></li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Search"><i class="fa fa-search"></i></a></li>
  <li class="w3-hide-small w3-dropdown-hover">
    <a href="#" class="w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-user"></i></a>     
    <div class="w3-dropdown-content w3-medium w3-white w3-card-4">
      <a href="home.php">My Profile</a>
      <a href="#">Settings</a>
      <a href="#">Log Off</a>
    </div>
  </li>
  <li class="w3-hide-small"><a href="#" class="w3-padding-large w3-hover-white" title="Messages"><i class="fa fa-envelope"></i></a></li>
  <li class="w3-hide-small w3-dropdown-hover">
    <a href="#" class="w3-padding-large w3-hover-white" title="Notifications"><i class="fa fa-bell"></i><span class="w3-badge w3-right w3-small w3-green">3</span></a>     
    <div class="w3-dropdown-content w3-medium w3-white w3-card-4">
      <a href="#">Someone commented</a>
      <a href="#">Someone Liked</a>
      <a href="#">Someone friended</a>
    </div>
  </li>
  <li class="w3-hide-small w3-right"><a href="#" class="w3-padding-large w3-hover-white" title="My Account"><img src="#" class="w3-circle" height="25" width="25" alt="Avatar"></a></li>
 </ul>
</div>

<!-- Navbar on small screens -->
<div id="navDemo" class="w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:51px">
  <ul class="w3-navbar w3-left-align w3-large w3-theme">
    <li><a class="w3-padding-large" href="#">Messages</a></li>
    <li><a class="w3-padding-large" href="#">Notifications</a></li>
    <li><a class="w3-padding-large" href="home.php">My Profile</a></li>
  </ul>
</div>