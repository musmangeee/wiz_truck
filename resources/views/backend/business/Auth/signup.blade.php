<!doctype html>
<html lang="en">

<!-- Mirrored from dashkit.goodthemes.co/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 May 2020 10:14:21 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
@include('backend.partials.head')

<body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary">

    <!-- CONTENT
    ================================================== -->
    <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
          <div class="col-12 col-md-5 col-lg-6 col-xl-4 px-lg-6 my-1">
                
            <!-- Heading -->


            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
           @endif
    <form class="tab-content py-6" id="wizardSteps" action="{{route('Businessregister')}}" method="POST"
            enctype="multipart/form-data">
            @csrf


         

    


          <div class="tab-pane fade show active" id="wizardStepOne" role="tabpanel"
               aria-labelledby="wizardTabOne">

              <!-- Header -->
              <div class="row justify-content-center">
                  <div class="col-12 col-md-10  text-center">

                      <!-- Pretitle -->
                      <h6 class="mb-4 text-uppercase text-muted">
                          Step 1 of 3
                      </h6>

                      <!-- Title -->
                      <h1 class="mb-3">
                          Let’s lookup your business.
                      </h1>

                      <!-- Subtitle -->
                      {{-- <p class="mb-5 text-muted">
                          Your Business may already on wiztruck, If isn't you may add it.
                      </p> --}}

                  </div>
              </div> <!-- / .row -->


              <!-- Team name -->
              {{-- <div class="form-group">

                  <!-- Label -->
                  <label>
                      City
                  </label>

                  <!-- Input -->
                  <select class="custom-select signup_city" data-toggle="select" name="city_id" required>
                      @foreach($cities as $city)
                          <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>
                      @endforeach
                  </select>

              </div> --}}
              <!-- Team name -->
              <div class="form-group signup_town">
              </div>


              
              <!-- Team description -->
              <div class="form-group">

                <!-- Label -->


                <input type="text" class="autocomplete_business form-control" name="business_name"  required placeholder="Business name" required>
            </div>

                 <div class="form-group">

                <!-- Label -->
            
                <input type="number" class="autocomplete_business form-control" name="zipcode"  required placeholder="Zip code" required>
            </div>




              <div class="form-group">

                  <!-- Label -->
                 

                   <input type="text" name="address" class="form-control"
                          id="location" placeholder="Address" required>
              </div>

               <input type="hidden"  class="form-control"
              placeholder="" id="pzcode" >

              <input type="hidden"  class="form-control"
              placeholder="" id="selCountry" >

              <input type="hidden"  class="form-control"
              placeholder="" id="pstate" name='state'>

              <input type="hidden"  class="form-control"
              placeholder="" id="pCity" name='city'>

              <input type="hidden"  class="form-control"
              placeholder="" id="txtPlaces" >

              <input type="hidden"  class="form-control"
              placeholder="" id="plati" name="latitude">

              <input type="hidden" class="form-control"
              placeholder="" id="plongi" name="longitude">


              {{-- <!-- Team description -->
              <div class="form-group">
                  <!-- Label -->
                  <label class="mb-1">
                      Business Address <small class="text-primary"></small>
                  </label>

                  <input type="text" name="address" class="form-control"
                         placeholder="" id="location">

              </div> --}}


              {{-- <input type="text" name="address" class="form-control"
              placeholder="" id="pzcode" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="selCountry" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="pstate" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="pCity" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="txtPlaces" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="plati" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="plongi" > --}}


            
               <div class="form-group">

                            <!-- Label -->
                            {{-- <label>
                                Business Categories
                            </label> --}}

                            <!-- Input -->
                            <select name="categories[]" id="" class="form-control" data-toggle="select" required multiple autocomplete="false" placeholder="Category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div>

                            <div class="form-group">

                  <!-- Label -->
                  {{-- <label class="mb-1">
                      Business Phone Number
                  </label> --}}

                  <input type="text" name="phone" class="form-control" placeholder=" Phone Number"
                         data-mask="000-000-0000" required >
              </div>


           




              <!-- Divider -->
              <hr class="my-5">

              <!-- Footer -->
              <div class="row align-items-center">
                  <div class="col-auto">

                      <!-- Button -->
                      <button class="btn btn-lg btn-white" type="reset">Cancel</button>

                  </div>
                  <div class="col text-center">

                      <!-- Step -->
                      <h6 class="text-uppercase text-muted mb-0">Step 1 of 3</h6>

                  </div>
                  <div class="col-auto">

                      <!-- Button -->
                      <a class="btn btn-lg btn-primary" data-toggle="wizard"
                         href="#wizardStepTwo">Continue</a>

                  </div>
              </div>

          </div>

          {{-- Section 2  --}}

          <div class="tab-pane fade" id="wizardStepTwo" role="tabpanel" aria-labelledby="wizardTabTwo">

              <!-- Header -->
              <div class="row justify-content-center">
                  <div class="col-12 col-md-10  text-center">

                      <!-- Pretitle -->
                      <h6 class="mb-4 text-uppercase text-muted">
                          Step 2 of 3
                      </h6>

                      <!-- Title -->
                      <h1 class="mb-3">
                          Get started by telling us how customers will reach you
                      </h1>

                      {{-- <!-- Subtitle -->
                      <p class="mb-5 text-muted">
                          Add your business contact information, so customers can reach you.
                      </p> --}}

                  </div>
              </div> <!-- / .row -->

      
               {{-- <div class="form-group">

                            <!-- Label -->
                            <label>
                                Business Categories
                            </label>

                            <!-- Input -->
                            <select name="categories[]" id="" class="form-control" data-toggle="select" required multiple autocomplete="false">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                        </div> --}}



            {{-- <div class="form-group">

                <!-- Label -->
                <label class="mb-1">
                    Address
                </label>

                <input type="text" name="address" class="form-control" placeholder="Business Phone adrress"
                         required>
                 </div> --}}
    
              <!-- Team description -->
              <div class="form-group">

                  <!-- Label -->
                  {{-- <label class="mb-1">
                      Business Phone Number
                  </label> --}}

                  <input type="text" name="phone" class="form-control" placeholder="Business Phone Number"
                         data-mask="(000) 000-0000" required>
              </div>

    

              <!-- Team description -->
              <div class="form-group">

                  <!-- Label -->
                  {{-- <label class="mb-1">
                      Business Website
                  </label> --}}

                  <input type="url" name="url" class="form-control" placeholder="Business Website" >
              </div>

                <!-- Team description -->
              <div class="form-group">

                  <!-- Label -->
                  {{-- <label class="mb-1">
                      Business Email
                  </label> --}}

                  <input type="email" name="business_email" class="form-control" placeholder="Business Email" >
              </div>


              
                 <div class="col-md-12">
                     
                      <!-- Team description -->

                      <div class="input-images"></div>
                    
                  </div>


              {{-- <!-- Team description -->
              <div class="form-group">
                  <!-- Label -->
                  <label class="mb-1">
                      Business Address <small class="text-primary"></small>
                  </label>

                  <input type="text" name="address" class="form-control"
                         placeholder="" id="location">

              </div> --}}


              {{-- <input type="text" name="address" class="form-control"
              placeholder="" id="pzcode" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="selCountry" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="pstate" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="pCity" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="txtPlaces" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="plati" >

              <input type="text" name="address" class="form-control"
              placeholder="" id="plongi" > --}}

              <!-- Starting files -->


              <!-- Divider -->
              <hr class="my-5">

              <!-- Footer -->
              <div class="row align-items-center">
                  <div class="col-auto">

                      <!-- Button -->
                      <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepOne">Back</a>

                  </div>
                  <div class="col text-center">

                      <!-- Step -->
                      <h6 class="text-uppercase text-muted mb-0">Step 2 of 3</h6>

                  </div>
                  <div class="col-auto">

                      <!-- Button -->
                      <a class="btn btn-lg btn-primary" data-toggle="wizard"
                         href="#wizardStepThree">Continue</a>

                  </div>
              </div>

          </div>
          <div class="tab-pane fade" id="wizardStepThree" role="tabpanel" aria-labelledby="wizardTabThree">

              <!-- Header -->
              <div class="row justify-content-center">
                  <div class="col-12 col-md-10 col-lg-8 col-xl-6 text-center">

                      <!-- Pretitle -->
                      <h6 class="mb-4 text-uppercase text-muted">
                          Step 3 of 3
                      </h6>

                      <!-- Title -->
                      <h1 class="mb-3">
                          User's details
                      </h1>

                      <!-- Subtitle -->
                      {{-- <p class="mb-5 text-muted">
                          By continuing, you agree to the terms and conditions, and acknowledge our privacy
                          policy.
                      </p> --}}

                  </div>
              </div> <!-- / .row -->


              <!-- Divider -->
              <hr class="mt-5 mb-5">

              <div class="col-md-12">
  
             <div class="form-group">
                <input type="text" class="form-control" name="name"  required placeholder="Name">
            </div>

             <div class="form-group">
                <input type="text" class="form-control" name="email"  required placeholder="Email">
            </div>

             <div class="form-group">
                <input type="password" class="form-control" name="password"  required placeholder="password">
            </div>

             <div class="form-group">
                <input type="password" class="form-control" name="confirm-password"  required placeholder="Confirm">
            </div>

              
               

              </div> <!-- / .row -->

              <!-- Divider -->
              <hr class="my-5">

              <!-- Footer -->
              <div class="row align-items-center">
                  <div class="col-auto">

                      <!-- Button -->
                      <a class="btn btn-lg btn-white" data-toggle="wizard" href="#wizardStepTwo">Back</a>

                  </div>
                  <div class="col text-center">

                      <!-- Step -->
                      <h6 class="text-uppercase text-muted mb-0">Step 3 of 3</h6>

                  </div>
                  <div class="col-auto">

                      <!-- Button -->
                      <button class="btn btn-lg btn-primary" type="submit">Create</button>

                  </div>
              </div>
              {{--  --}}

          </div>
      </form>

  
          </div>
          <div class="col-12 col-md-7 col-lg-6 col-xl-8 d-none d-lg-block">
            
            <!-- Image -->
            <div class="bg-cover vh-100 mt-n1 mr-n3" style="background-image: url(../backend/assets/img/covers/auth-side-cover.jpg);"></div>
  
          </div>
        </div> <!-- / .row -->
      </div>

    <!-- JAVASCRIPT
    ================================================== -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdAAjnKyYtVFYkgoTM5a5viCFgbWCspUA&libraries=places"></script>
    <!-- Libs JS -->
  
    @include('backend.partials.scripts')

    <script>
        $(document).ready(function () {
            $('.input-images').imageUploader();
            var options = {
        types: ['(regions)']
    }
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
    });  });


        });


//    $(document).ready(function () {
//         google.maps.event.addDomListener(window, 'load', initialize);
//         });

//         function initialize() {
//             var input = document.getElementById('location');
//             var autocomplete = new google.maps.places.Autocomplete(input);
//         }
        
      
         

    </script>

     


   
    



</body>


</html>




    









