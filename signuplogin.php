<?php

include("hotelheader.php"); 

?>

<section>

  <div class="signuplogin">

    <div class="userinfo email-group">

      <label for="email">Email Address:</label><br>

      <input type="email" id="email" placeholder="example@gmail.com">

    </div>

    <div class="userinfo password-group">

      <label for="password">Password:</label><br>

      <input type="password" id="password" placeholder="Enter a strong password">

    </div>

    <div class="submit-button">

      <button id="submit">Submit</button>

    </div>

    <div class="signup-toggle">

      <input type="hidden" id="signup" value="1">

      <p id="signup-text">Already registered? Click to</p><span class="toggle-link">Login.</span>

    </div>

  </div>

  <div id="errorMessage"></div>

  <div id="successMessage"></div>

</section>

<?php include("hotelfooter.php"); ?>