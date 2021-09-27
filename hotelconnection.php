<?php 

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

$dotenv->load();

$host_name = $_ENV['HOST_NAME'];

$user_name = $_ENV['USER_NAME'];

$password = $_ENV['PASSWORD'];

$database_name = $_ENV['DATABASE_NAME'];

$link = mysqli_connect($host_name, $user_name, $password, $database_name);

if(mysqli_connect_error()) {

  die("Unable to connect to database");
}

?>