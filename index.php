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

<?php include("hotelfooter.php"); ?>

<script type="text/javascript">

var long_lat_key = "";

var hotel_info_key = "";

$(window).on('load', function() {

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



//Get locale 

$("#locale").click(function() {

  const metadata = {
    "async": true,
    "crossDomain": true,
    "url": "https://hotels4.p.rapidapi.com/get-meta-data",
    "method": "GET",
    "headers": {
      "x-rapidapi-host": "hotels4.p.rapidapi.com",
      "x-rapidapi-key": hotel_info_key
    }
  };
  
  $.ajax(metadata).done(function (response) {

    $.each(response, function(key, value) {

      $("#localeList").append('<table id="localeTable"><tr class="eachLocale"><th>' + value['name'] + '</th><td class="rowLocale">' + value['hcomLocale'] +'</td></tr></table>');
      
    })
    
  });

  $("#localeList").toggle();

})


$(document).on('click', '.eachLocale', function() {

  var countryLocale = $(this).find('td').text();

  $("#locale").val(countryLocale);

})

// Search button click event

 var bookingError = "";

  $("#search").click(function() {

  if($(".country").val() == "") {

    bookingError += "Country field is required<br>";

  }

  if($(".city").val() == "") {

    bookingError += "City field is required<br>";

  }

  if($(".checkinDate").val() == "") {

    bookingError += "Choose a checkin date<br>";

  }

  if($(".checkoutDate").val() == "") {

    bookingError += "Choose a checkout date<br>";

  }

  if($(".bookingDetails").val() == "") {

    bookingError += "Choose the number of adults<br>";

  }

  if(bookingError != "") {

    $("#bookingErrorMessage").html(bookingError);

  }else {

var address = $(".city").val();
var country = $(".country").val();
var checkinDate = $(".checkinDate").val();
checkinDate = checkinDate.split('/');
var indate = checkinDate[2] + '-' + checkinDate[0] + '-' + checkinDate[1];
var checkoutDate = $(".checkoutDate").val();
checkoutDate = checkoutDate.split('/');
var outdate = checkoutDate[2] + '-' + checkoutDate[0] + '-' + checkoutDate[1];
var rooms = $(".bookingDetails").val();
var latitude;
var longitude;
var hotelName = [];
var eachHotelName;
var hotelAddress = [];
var eachHotelAddress;
var hotelStarRating = [];
var eachHotelStarRating = 0;
var roomsLeft = [];
var eachRoomsLeft = 0;
var hotelPrice = [];
var eachHotelPrice = "";
var totalPricePerStay = [];
var eachTotalPrice = "";
var hotelId = [];
var eachHotelId = 0;
var cityHeading;
var hotelImage = [];
var eachHotelImage = "";
var hotelInfoElements = "";
var currentPage = 0;
var nextPage = 0;
    
   
    $.ajax({

      url:"https://maps.googleapis.com/maps/api/geocode/json?address=" + encodeURIComponent(address) + "&key=" + long_lat_key,
      type:"GET",
      success:function(response) {
      
        console.log(response);
      
        if(response['status'] != "OK") {
      
          alert("Unable to fetch data. Try again later");
      
        }else {
        
        $.each(response['results'][0]['geometry'], function(key, value) {
      
          if(key == "location") {
      
            latitude = value['lat'];
      
            longitude = value['lng'];
      
          }
      
        })

      }

        const getHotels = {
          "async": true,
          "crossDomain": true,
          "url": "https://hotels-com-free.p.rapidapi.com/srle/listing/v1/brands/hotels.com?lat="+latitude+"&lon="+longitude+"&checkIn="+indate+"&checkOut="+outdate+"&rooms="+rooms+"&locale="+country+"&currency=USD&pageNumber=1",
          "method": "GET",
          "headers": {
            "x-rapidapi-host": "hotels-com-free.p.rapidapi.com",
            "x-rapidapi-key": hotel_info_key
      
          }
      
        };
        
        $.ajax(getHotels).done(function (response) {
      
          console.log(response);

          if(response['result'] != "OK") {

            alert("Unable to fetch results for now. Try again later");

          }else{

            $.each(response['data'], function(key, value) {

              if(value['header']){

              cityHeading = value['header'];

              }

            })

            $(".cityName").html(cityHeading);

              console.log(cityHeading);

            $.each(response['data']['body']['searchResults']['results'], function(key, value) {

               eachHotelImage = value['optimizedThumbUrls']['srpDesktop'];

               eachHotelName = value['name'];

               eachHotelAddress = value['address']['streetAddress'];

               eachHotelStarRating = value['starRating'];

              if(value['roomsLeft']) {

                eachRoomsLeft = value['roomsLeft'];
  
                }else {
  
                  eachRoomsLeft = 0;
  
                }

                eachHotelId = value['id'].toString();

                eachHotelPrice = value['ratePlan']['price']['current'];

                eachTotalPrice = value['ratePlan']['price']['fullyBundledPricePerStay'];

                hotelInfoElements = '<div class="eachHotelContainer">' +

                '<input type="hidden" class="hid" value="' + eachHotelId + '">' +

                '<div class="hotelImageInfo">' +
            
                  '<img class="hotelImage" src="' + eachHotelImage + '"alt="Hotel Image">' +
            
                  '<div class="hotelInfo">' +
            
                    '<div class="hotelName">' + eachHotelName + '</div>' +
            
                    '<div class="hotelAddress">' + eachHotelAddress + '</div>' +
            
                    '<div class="starRating">Star Rating:<span id="hotelRating">' + eachHotelStarRating + '</span></div>' +
            
                  '</div>' +
            
                '</div>' +
            
                '<div class="hotelPriceBooking">' +
            
                  '<div class="roomsLeft">Rooms left:<span id="numberOfRoomsLeft">' + eachRoomsLeft + '</span></div>' +
            
                  '<div class="nightPrice">Nightly price:<span id="night">' + eachHotelPrice + '</span></div>' +
            
                  '<div class="totalPrice">Total price:<span id="total">' + eachTotalPrice + '</span></div>' +
            
                  '<button class="viewRooms">View</button>' +
            
                '</div>' +
            
              '</div>';

              $(".eachCityContainer").append(hotelInfoElements);

            }) 

          }//END OF ELSE

        }); //END OF SECOND AJAX
      
      }//END OF FIRST AJAX SUCCESS

      })// END OF FIRST AJAX

      window.scrollTo(1000,1000);

    }//END OF CLICK ELSE

})//END OF SEARCH CLICK EVENT
  
    $(document).on('click', '.viewRooms', function()  {

      var hotel = $(this).closest(".eachHotelContainer");
      
      var hid = hotel.find(".hid").val();
      
      var hname = hotel.find(".hotelName").html();

      var country = $(".country").val();

      var checkinDate = $(".checkinDate").val();
      
      checkinDate = checkinDate.split('/');

      var indate = checkinDate[2] + '-' + checkinDate[0] + '-' + checkinDate[1];

      var checkoutDate = $(".checkoutDate").val();

      checkoutDate = checkoutDate.split('/');

      var outdate = checkoutDate[2] + '-' + checkoutDate[0] + '-' + checkoutDate[1];

      var rooms = $(".bookingDetails").val();

      var roomName = "";

      var roomImage = "";

      var roomsInfoElements = "";

      var bookingUrl = "";

      var bookingElements = "";

      var modal = $(".modal");

      $(".getHotelName").html(hname);

      const roomsDetails = {
        "async": true,
        "crossDomain": true,
        "url": "https://hotels-com-free.p.rapidapi.com/pde/property-details/v1/hotels.com/"+hid +"?rooms="+rooms+"&checkIn="+indate+"&checkOut="+outdate+"&locale="+country+"&currency=USD&include=neighborhood",
        "method": "GET",
        "headers": {
          "x-rapidapi-host": "hotels-com-free.p.rapidapi.com",
          "x-rapidapi-key": hotel_info_key
        }
      };
      
      $.ajax(roomsDetails).done(function (response) {

        console.log(response);

        $.each(response['data']['body']['roomsAndRates']['rooms'], function(roomkey, roomvalue) {
 
          roomName = roomvalue['name'];

          roomImage = roomvalue['images'][0]['fullSizeUrl'];

          roomsInfoElements = '<div class="roomsRow"><img src="' + roomImage + '"class="roomImage"><p class="roomName">' + roomName + '</p></div>';

          $(".hotelRoomsContainer").append(roomsInfoElements);

        })

        $.each(response['data']['body'], function(bookingkey, bookingvalue) {

          bookingUrl = bookingvalue['bookingUrl'];

        })

        bookingElements = '<div class="bookingUrl"><a href="' + bookingUrl + '">Book Now</a></div>';

        $(".hotelRoomsContainer").append(bookingElements);

        modal.css("display", "block");

      });

    })

    $(".close").click(function() {

      var modal = $(".modal");

      modal.css("display", "none");

      $(".hotelRoomsContainer").empty();

    })

</script>

  
  