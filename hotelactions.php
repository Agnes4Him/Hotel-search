<?php 

session_start();

include("hotelconnection.php");

$error = "";

if($_GET['action'] == "uservalidation") {

  if(!$_POST['email']) {

    $error .= "Email is required<br>";
  }

  if(!$_POST['password']) {

    $error .= "Password is required<br>";
  }

  if (($_POST['email']) && (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))) {
    
    $error.="The email address is not valid.<br>";
  }

  if (($_POST['password']) && (strlen($_POST["password"]) < '8')) {

    $error .= "Your Password Must Contain At Least 8 characters<br>";
}

if($error != "") {

  echo $error;

}else {

  if($_POST['signup'] == "1") {

    $query = "SELECT * FROM usersinfo WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result)> 0) {

      $error = "That email address has been taken";

      echo $error;

    }else {

      $query = "INSERT INTO usersinfo (email, password) VALUES ('".mysqli_real_escape_string($link, $_POST['email'])."','".mysqli_real_escape_string($link, $_POST['password'])."')";

      if(mysqli_query($link, $query)) {

        $_SESSION['id'] = mysqli_insert_id($link);

        $query = "UPDATE usersinfo SET password='".md5(md5(mysqli_insert_id($link)).mysqli_real_escape_string($link, $_POST['password']))."' WHERE id='".mysqli_insert_id($link)."' LIMIT 1";

        if(mysqli_query($link, $query)) {

          echo "1";

        }
      } else {

        $error = "Unable to sign you up. Please, try again.";

        echo $error;

      }

    }

  }else {

    $hashedPassword="";

    $query = "SELECT * FROM usersinfo WHERE email='".mysqli_real_escape_string($link, $_POST['email'])."' LIMIT 1";

    $result = mysqli_query($link, $query);

    $row=mysqli_fetch_assoc($result);

    if(isset($row)) {

    $hashedPassword = md5(md5($row['id']).mysqli_real_escape_string($link, $_POST['password']));

    if($hashedPassword == $row['password']) {

      $_SESSION['id'] = $row['id'];

      echo "2";

    }else {

      $error = "That email/password combination does not exist";

      echo $error;
    }

    }else {

      $error = "You are not yet signed up";

      echo $error;
    }
  }
}

}

require_once('vendor/autoload.php');

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);

$dotenv->load();

$arr;

$encodedarr;

if($_GET['action'] == "getkeys") {

  $arr = getenv();

  $encodedarr = json_encode($arr);

  echo $encodedarr;

}

$newslettererror = "";

if($_GET['action'] == "newsletter") {

  if($_SESSION['id']) {

   if(!$_POST['newsletteremail']) {

   $newslettererror .= "Email is required";

   }

  if(($_POST['newsletteremail']) && (!filter_var($_POST['newsletteremail'], FILTER_VALIDATE_EMAIL))) {

    $newslettererror .= "Enter a valid email address";
 
   }

   if($newslettererror != "") {

    echo $newslettererror;

   }else {

    $query = "SELECT * FROM newsletters WHERE email='".mysqli_real_escape_string($link, $_POST['newsletteremail'])."' LIMIT 1";

    $result = mysqli_query($link, $query);

    if(mysqli_num_rows($result) > 0) {

      $newslettererror = "That email address has been taken";

      echo $newslettererror;

    }else {

      $query = "INSERT INTO newsletters (email, userid) VALUES ('".mysqli_real_escape_string($link, $_POST['newsletteremail'])."','".$_SESSION['id']."')";

      mysqli_query($link, $query);

      echo "1";

    }

   }

  }else {

    $newslettererror = "You are not logged in";

    echo $newslettererror;
  }
}

?>