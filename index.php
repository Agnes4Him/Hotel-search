<?php 

include("hotelheader.php"); 

?>

<section>

  <div class="home-section-1">

    <video src="videos/video5.mp4" muted loop autoplay class="video-background"></video>

    <h2 class="video-content">Find And Book A Place For Your <span class="relaxation">Relaxation</span></h2>

  </div>

</section>

<section>

   <div class="home-section-2">

      <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. 
        Accusantium, illum aliquid! Repellendus ratione, voluptates nemo, 
        quia dolor officiis, cupiditate doloremque ad rerum voluptatibus 
        iure minima vitae necessitatibus asperiores dolore laboriosam 
        recusandae similique fuga beatae repudiandae culpa eligendi aperiam! 
        Adipisci, earum? Officiis repellat eum, placeat qui ex dolorum. 
        Assumenda ducimus, pariatur dolorum consequatur esse asperiores 
        ipsum omnis sit, nobis voluptas harum!</p>

   </div>

</section>

<?php 

if($_SESSION['id']) { ?>

<section>

  <div class="home-section-3">

  <div id="bookingErrorMessage"></div>

   <div class="search-container">

    <div class="destinaion input-container">

     <i class="fas fa-hotel"></i>

     <input type="text" placeholder="Locale" class="search-box country" id="locale" title="Click the field to select locale">

     <input type="text" placeholder="Destination Address" class="search-box city">

    </div>

    <div class="date input-container">

     <i class="fas fa-calendar-alt"></i>

     <input type="text" placeholder="Check-in" class="search-box checkinDate">

     <input type="text" placeholder="Check-out" class="search-box checkoutDate">

    </div>

    <div class="number-details input-container">

     <i class="fas fa-user"></i>

     <input type="text" placeholder="2 rooms" class="search-box bookingDetails">

     <i class="fas fa-chevron-down downButton"></i>

   </div>

     <input type="button" value="Search" id="search">

   </div>

  </div>

  <div class="dropdownBox">

    <div class="sub-container adults">

      <p>Rooms</p>

      <div class="details">

        <input type="number" min="1" max="100" class="number adultNumber" value="2" oninput="validity.valid||(value='');">

      </div>

    </div>

    <div class="sub-container children">

      <div class="children-age">

        <p>Children<br>(0 - 17)</p>

        <select class="age" name="age">

            <option value="0 - 3years">0 - 3years</option>

            <option value="4 - 6years">4 - 6years</option>

            <option value="7 - 9years">7 - 9years</option>

            <option value="10 - 12yeas">10 - 12years</option>

            <option value="13 - 17yeas">13 - 17years</option>

        </select>

      </div>

      <div class="details">

        <input type="number" min="0" max="100" class="number" value="0" oninput="validity.valid||(value='');">

      </div>

    </div>

    <div class="sub-container rooms">

      <p>Adults</p>

      <div class="details">

        <input type="number" min="1" max="100" class="number" value="1" oninput="validity.valid||(value='');">

      </div>

    </div>
    
  </div>

  <div id="localeList">

    <h5>Destination Locale</h5>

  </div>

</section>

<?php } ?>

<section id="hotelInfoPage">

  <div class="container eachCityContainer">

    <h3 class="cityName"></h3>

  </div>

</section>

<!-- The Modal -->
<div id="myModal" class="modal">


  <!-- Modal content -->

  <div class="modal-content">

    <span class="close">&times;</span>

    <div class="hotelRoomsContainer">

      <h3 class="getHotelName"></h3>

    </div>

  </div>

</div>

<section>

  <div class="home-section-4">

    <div class="parallax-image"></div>

  </div>

</section>

<section>

  <div class="home-section-5">

    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
      Nam accusamus temporibus neque fuga atque, consequuntur harum aliquam, 
      veritatis exercitationem cumque suscipit quod praesentium facere vel repellat! 
      Consequuntur consectetur rerum, obcaecati quibusdam quos veniam nemo praesentium odit. 
      Enim veritatis deserunt magnam reiciendis molestias dolores labore, 
      accusantium nisi maiores, debitis optio ipsam, est nesciunt excepturi
       numquam quis rerum minima? Tempora, culpa numquam.
    </p>

    <img src="images/image7.jpg" alt="home-section-5-image">

  </div>

  <div class="invisible"></div>

</section>

<section>

  <div class="slideshow-container">

<div class="mySlides fade">

  <img src="images/image1.jpg" style="width:100%" class="carousel-image">

  <div class="text">Elegance</div>

</div>

<div class="mySlides fade">
  
  <img src="images/image2.jpg" style="width:100%" class="carousel-image">

  <div class="text">Serenity</div>

</div>

<div class="mySlides fade">
  
  <img src="images/image3.jpg" style="width:100%" class="carousel-image">

  <div class="text">Comfort</div>

</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

</section>

<section>

  <div class="newsletter-container">

    <div id="newsletterError"></div>

    <div id="newsletterSuccess"></div>

    <h3>Sign up for our newsletters</h3>

    <div class="newsletter">

      <input type="email" id="newsletterEmail" placeholder="example@gmail.com">

      <input type="submit" id="newsletterSubmit" value="Submit">

    </div>

  </div>

</section>

<script type="text/javascript">

var long_lat_key = "";

var hotel_info_key = "";

$(document).on('load', function() {

  $.ajax({

    method:"GET",
    url:"hotelactions.php?action=getkeys",
    success:function(result){

     if(result == "<?php echo $long_lat; ?>") {

      long_lat_key = "<?php echo $long_lat; ?>";

     }else if(result == "<?php echo $hotel_info; ?>") {

      hotel_info_key = "<?php echo $hotel_info; ?>";

     }

    }
  })
})

</script>

<?php include("hotelfooter.php"); ?>
  
  