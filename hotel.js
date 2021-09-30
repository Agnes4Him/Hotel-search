

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

var long_lat_key = "";

var hotel_info_key = "";

document.load(function() {

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

$(".downButton").click(function() {

  $(".dropdownBox").toggle();

})

$(".checkinDate").click(function() {

  $(".checkinDate").datepicker({

            todayHighlight: true,
            autoclose: true
  });

})

$(".checkoutDate").click(function() {

  $(".checkoutDate").datepicker({

            todayHighlight: true,
            autoclose: true
  });
  
})


$(".adultNumber").change(function() {

  var adultNumber = $(".adultNumber").val();

  $(".bookingDetails").val(adultNumber); // adults number changed to room number

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



