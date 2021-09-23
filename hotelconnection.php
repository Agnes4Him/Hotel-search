<?php 

$link = mysqli_connect("localhost:8889", "root", "root", "hotel");

if(mysqli_connect_error()) {

  die("Unable to connect to database");
}

?>