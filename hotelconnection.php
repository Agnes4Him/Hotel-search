<?php 

/*Connection to local database

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);

$dotenv->load();

$link = mysqli_connect($host_name, $user_name, $password, $database_name);*/

 //Connection to heroku database 

 $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
 $cleardb_server = $cleardb_url["host"];
 $cleardb_username = $cleardb_url["user"];
 $cleardb_password = $cleardb_url["pass"];
 $cleardb_db = substr($cleardb_url["path"],1);
 $active_group = 'default';
 $query_builder = TRUE;
 // Connect to DB
 $link = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

if(mysqli_connect_error()) {

  die("Unable to connect to database");
}

?>