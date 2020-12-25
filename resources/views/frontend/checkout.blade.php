@extends('layouts.frontend')


@section('content')
    @include('frontend.partials.default_banner')







<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Showing User's Location on Google Map</title>
 
   
   <!-- JAVASCRIPT
    ================================================== -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdAAjnKyYtVFYkgoTM5a5viCFgbWCspUA&libraries=places"></script>
    <!-- Libs JS -->
  


    <script>
        $(document).ready(function () {
                alert('check');
             google.maps.event.addDomListener(window, 'load', function() {
             var places = new google.maps.places.Autocomplete(document
             .getElementById('location'),options);
             google.maps.event.addListener(places, 'place_changed', function() {
             var place = places.getPlace();
     
        var address = place.formatted_address;
        console.log(place,address);

        var  value = address.split(",");
        count=value.length; 
        country=value[count-1];
        state=value[count-2];
        city=value[count-3];
        var z=state.split(" ");
        document.getElementById("selCountry").text = country;
        var i =z.length;
        document.getElementById("pstate").value = z[1];
        if(i>2)
        
        document.getElementById("pCity").value = city;
        var latitude = place.geometry.location.lat();
        var longitude = place.geometry.location.lng();
        var mesg = address;
        document.getElementById("txtPlaces").value = mesg;
        var lati = latitude;
        document.getElementById("plati").value = lati;
        var longi = longitude;
        document.getElementById("plongi").value = longi;   
             }
      }); 
   });


        });


//    $(document).ready(function () {
//         google.maps.event.addDomListener(window, 'load', initialize);
//         });

//         function initialize() {
//             var input = document.getElementById('location');
//             var autocomplete = new google.maps.places.Autocomplete(input);
//         }
        
      
         

    </script>






  </head>
  <body>
   <div class="container">
    <div class="row">
      
     


      <div class="card w-75">
        <input type="text" name="address" class="form-control"
        id="location" placeholder="Address">
        </div>
  
               
        <div class="card-body">
          
         <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <h5 class="card-title">We're missing your area</h5>
          <div class="form-group">
            <label for="exampleInputEmail1">address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Floor Optional">
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <button type="button" class="btn btn-primary btn-lg btn-block">Submit</button>
        </div>
        <div class="card">
          <div class="card-body">
           <h5 class="card-title">Personal Details</h5>
           <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
           <a href="#" class="btn btn-primary">Go somewhere</a>
         </div>
         
       </div>

       
      </div>


     
</div>
</div>



<div class="container">
  <div class="row mt-4">
      <div class="col-xs-12 col-md-4 offset-md-4">
          <div class="card ">
              <div class="card-header">
                  <div class="row mb-4">
                      <h3 class="text-xs-center">Payment Details</h3>
                      <img class="img-fluid cc-img mb-3" src="http://www.prepbootstrap.com/Content/images/shared/misc/creditcardicons.png">
                  </div>
              </div>
              <div class="card-block">
                  <form role="form">
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="form-group ml-4">
                                  <label>CARD NUMBER</label>
                                  <div class="input-group">
                                      <input type="tel" class="form-control ml-1" placeholder="Valid Card Number" />
                                      <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-7 col-md-7">
                              <div class="form-group ml-2">
                                  <label><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
                                  <input type="tel" class="form-control ml-2" placeholder="MM / YY" />
                              </div>
                          </div>
                          <div class="col-xs-5 col-md-5 float-xs-right">
                              <div class="form-group mr-3">
                                  <label>CV CODE</label>
                                  <input type="tel" class="form-control" placeholder="CVC" />
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-xs-12">
                              <div class="form-group ml-4">
                                  <label>CARD OWNER</label>
                                  <input type="text" class="form-control ml-2" placeholder="Card Owner Names" />
                              </div>
                          </div>
                      </div>
                  </form>
              </div>
              <div class="card-footer">
                  <div class="row d-flex justify-content-center">
                      <div class="col-xs-12">
                          <button class="btn btn-warning btn-lg btn-block center">Process payment</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

<style>
  .cc-img {
      margin: 0 auto;
  }
</style>


     </body>
  <style>
    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
.cc-img {
        margin: 0 auto;
    }
    </style>
</html>

@endsection