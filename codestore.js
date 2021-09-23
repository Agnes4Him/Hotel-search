//Change date format 1

var date = "2016-10-15";
date = date.split("-").reverse().join("-");
console.log(date);

//Change date format 2- prefered

var dateAr = '2016-10-15'.split('-');
var newDate = dateAr[1] + '-' + dateAr[2] + '-' + dateAr[0];

console.log(newDate);

//Change date format 3

var OldDate = new Date('2016-10-15');
 var NewDate = OldDate.getDate() + '-' + (OldDate.getMonth() + 1) + '-' + OldDate.getFullYear();


 //hotelinfo.php page 

 <div class="container eachCityContainer">

     <h3 class="cityName">Ikeja, Lagos</h3>

     <div class="eachHotelContainer">

       <div class="hotelImageInfo">

         <img class="hotelImage" src="images/image1.jpg" alt="Hotel Image">

         <div class="hotelInfo">

           <div class="hotelName">RockView Hotel</div>

           <div class="hotelAddress">Unilag estate Magodo</div>

           <div class="starRating">Star Rating:<span id="hotelRating">4</span></div>

         </div>

       </div>

       <div class="hotelPriceBooking">

         <div class="roomsLeft">Rooms left:<span id="numberOfRoomsLeft">3</span></div>

         <div class="nightPrice">Nightly price:<span id="night">$41</span></div>

         <div class="totalPrice">Total price:<span id="total"><strong>$289</strong> for 7 nights</span></div>

         <button class="bookNow">Book Now</button>

       </div>

     </div>

   </div>

</div>


// Trying to append html to hotelinfo page

var html = `<div class="eachCityContainer">

<h3 class="cityName">${cityHeading}</h3>

<div class="eachHotelContainer">

    <div class="hotelImageInfo">

      <img class="hotelImage" src=${detailsvalue['thumbnailUrl']} alt="Hotel Image">

      <div class="hotelInfo">

        <div class="hotelName">${eachHotelName}</div>

        <div class="hotelAddress">${eachHotelAddress}</div>

        <div class="starRating">Star Rating:<span id="hotelRating">${eachHotelStarRating}</span></div>

      </div>

    </div>

    <div class="hotelPriceBooking">

      <div class="roomsLeft">Rooms left:<span id="numberOfRoomsLeft">${eachRoomsLeft}</span></div>

      <div class="nightPrice">Nightly price:<span id="night">${eachHotelPrice}</span></div>

      <div class="totalPrice">Total price:<span id="total">${eachTotalPrice}</span></div>

      <button class="viewRooms">View</button>

    </div>

  </div>

  </div>`
      
  $(".eachCityContainer").append(html);

  //Looping through hotel results 

  $.each(response['data']['body']['searchResults']['results'], function(key, value) {

    hotelImage.push((value['optimizedThumbUrls']['srpDesktop']));

    for(var i = 0; i < hotelImage.length; i++) {

     eachHotelImage = hotelImage[i];

   }

    hotelName.push((value['name']));

    for(var i = 0; i < hotelName.length; i++) {

     eachHotelName = hotelName[i];

   }

   hotelAddress.push((value['address']['streetAddress']));

   for(var i = 0; i < hotelAddress.length; i++) {

     eachHotelAddress = hotelAddress[i];

   } 
   
   hotelStarRating.push((value['starRating']));

   for(var i = 0; i < hotelStarRating.length; i++) {

     eachHotelStarRating = hotelStarRating[i]; 

   }

   if(value['roomsLeft']) {

     roomsLeft.push((value['roomsLeft']));

     }else {

       roomsLeft.push(0);

     }

     for(var i = 0; i < roomsLeft.length; i++) {

       eachRoomsLeft = roomsLeft[i];

     }

     hotelId.push((value['id']));

     for(var i = 0; i < hotelId.length; i++) {

       eachHotelId = hotelId[i].toString();

     }


     hotelPrice.push((value['ratePlan']['price']['current']));

     for(var i = 0; i < hotelPrice.length; i++) {

       eachHotelPrice = hotelPrice[i];

     }

     totalPricePerStay.push((value['ratePlan']['price']['fullyBundledPricePerStay']));

     for(var i = 0; i < totalPricePerStay.length; i++) {

       eachTotalPrice = totalPricePerStay[i];

     }

     

     hotelInfoElements = $('<div class="eachHotelContainer">' +

     '<input type="hidden" value=${eachHotelId}>' +

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
 
   '</div>');

   $(".eachCityContainer").append(hotelInfoElements);
     
 }) //END OF $.EACH 

 //HOW TO CREATE A NEW HTML PAGE 

 w = window.open('','newwinow','width=800,height=600,menubar=1,status=0,scrollbars=1,resizable=1);
d = w.document.open("text/html","replace");
d.writeln('<html><head>' +
  '<link rel="stylesheet" type="text/css" href="style.cs"/></head>' +
  +'<body></body></html>');
// use d to manipulate DOM of new document and display results


//Media query screen sizes 

/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {...}

/* Small devices (portrait tablets and large phones, 600px and up) */
@media only screen and (min-width: 600px) {...}

/* Medium devices (landscape tablets, 768px and up) */
@media only screen and (min-width: 768px) {...}

/* Large devices (laptops/desktops, 992px and up) */
@media only screen and (min-width: 992px) {...}

/* Extra large devices (large laptops and desktops, 1200px and up) */
@media only screen and (min-width: 1200px) {...}