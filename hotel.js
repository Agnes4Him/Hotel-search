

$(".toggle-link").click(function() {

  if($("#signup").val() == "1") {

    $("#signup").val("0");

    $("#signup-text").html("Not yet registered? Click to");

    $(".toggle-link").html("Signup");

  }else {

    $("#signup").val("1");

    $("#signup-text").html("Already registered? Click to");

    $(".toggle-link").html("Login");

  }

})

$("#submit").click(function(e) {

  e.preventDefault();

  var email = $("#email").val();

  var password = $("#password").val();

  var signup = $("#signup").val();

  $.ajax({

    method:"POST",

    url:"hotelactions.php?action=uservalidation",

    data:{email:email, password:password, signup:signup},

    success:function(result) {

      if(result == "1") {

        $("#successMessage").html("Signup successful").show();

        $("#errorMessage").hide();

        setTimeout('window.location.assign("/index.php")', 1500);

      }else if(result == "2") {

        $("#successMessage").html("Login successful").show();

        $("#errorMessage").hide();

       setTimeout('window.location.assign("/index.php")', 1500);

      }else {

        $("#errorMessage").html(result).show();

        $("#successMessage").hide();
      }
    }
  })
})


$("#newsletterSubmit").click(function(e) {

  e.preventDefault();

  var newsletteremail = $("#newsletterEmail").val();

  $.ajax({

    method:"POST",

    url:"hotelactions.php?action=newsletter",

    data:{newsletteremail:newsletteremail},

    success:function(result) {

      if(result == "1") {

        $("#newsletterSuccess").html("You have successfully signed up for our newsletter").show();

        $("#newsletterError").hide();

      }else {

        $("#newsletterError").html(result).show();

        $("#newsletterSuccess").hide();
      }
    }
  })
})


//carousel

var slideIndex = 0;

showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
};



