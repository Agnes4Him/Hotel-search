<?php

session_start();

if($_GET['function'] == "logout") {

  session_unset();

}

?>

<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Hotel Booking</title>

  <script type="text/javascript" src="jquery.min.js"></script>
      
  <script src="jquery-ui/jquery-ui.js"></script>
      
  <link href="jquery-ui/jquery-ui.css" rel="stylesheet">

  <link href="hotel.css" rel="stylesheet">

  <script src="https://kit.fontawesome.com/539b4db01a.js" crossorigin="anonymous"></script>

</head>

<body>

<header>

  <div class="topbar">

    <div class="topbar-container container">

      <div class="brand">

        <a href="index.php"><i class="fas fa-home"></i><span class="brand-name">FindHotels</span></a>

      </div>

      <?php 

      if(isset($_SESSION['id'])) {  ?>

      <a class="topbar-button" href="?function=logout">Logout</a>

      <?php }else { ?>

      <a class="topbar-button" href="signuplogin.php">Signup/Login</a>

      <?php } ?>

    </div>

  </div>

</header>