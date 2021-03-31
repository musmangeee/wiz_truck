<script src="{{ URL::asset('backend/assets/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/%40shopify/draggable/lib/es5/draggable.bundle.legacy.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/autosize/dist/autosize.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/highlightjs/highlight.pack.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/list.js/dist/list.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/quill/dist/quill.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/chart.js/Chart.extension.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/rater/rater.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/libs/image-upload/image-uploader.min.js') }}"></script>


<!-- Theme JS -->
<script src="{{ URL::asset('backend/assets/js/theme.min.js') }}"></script>
<script src="{{ URL::asset('backend/assets/js/dashkit.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
{{-- <script type="text/javascript"
        src="https://maps.google.com/maps/api/js?key=AIzaSyBKCWfdUQDXxWBbfUp0JZ5p0LYbZWPXJ44&sensor=TRUEORFALSE"></script> --}}
<script>
    var path = "{{ url('/') }}";
</script>
<script src="{{ URL::asset('backend/assets/js/custom.js') }}"></script>


       
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKCWfdUQDXxWBbfUp0JZ5p0LYbZWPXJ44&libraries=places" >
</script>



    
<script>
$(document).ready(function() {    
    

    
    


    $('#get_package').hide();
    $('#eater_id').keyup(function(){
        var package = $('input[name="package_id"]:checked').val();
        var eaters = $('#eater_id').val();
        var payer = $('input[name="payer"]:checked').val();
        var booking_fee = 0;
        if(package == 1)
        {
           
                
            if(eaters >= 20 && eaters <= 49){
                $('#get_package').show();
                if(payer == 'host'){
                    booking_fee = 39.99 + (10 * eaters);
                    console.log(booking_fee);
                }else{
                    booking_fee = 39.99;
                   console.log(booking_fee); 
                }

                }else{
                $('#get_package').hide();
            }
           
        }
        if(package == 2)
        {
           
            if(eaters >= 50 && eaters <= 99){
                $('#get_package').show();
                
                if(payer == 'host'){
                    booking_fee = 59.99 + (10 * eaters);
                    console.log(booking_fee);
                }else{
                    booking_fee = 59.99;
                   console.log(booking_fee); 
                }
            }else{
                $('#get_package').hide();
            }
        
        }
        if(package == 3)
        {
            
            if(eaters >= 100){
                $('#get_package').show();
               
                if(payer == 'host'){
                    booking_fee = 79.99 + (10 * eaters);
                    console.log(booking_fee);
                }else{
                    booking_fee = 79.99;
                   console.log(booking_fee); 
                }
            }else{
                $('#get_package').hide();
            }
        
        }
        if(package == 4)
        {
           
            if(eaters >= 20 && eaters <= 49){
                $('#get_package').show();
              
                if(payer == 'host'){
                    booking_fee = 99.99 + (20 * eaters);
                    console.log(booking_fee);
                }else{
                    booking_fee = 99.99;
                   console.log(booking_fee); 
                }
            }else{
                $('#get_package').hide();
            }
        
        }
        if(package == 5)
        {
            
            if(eaters >= 50 && eaters <= 99){
                $('#get_package').show();
               
                if(payer == 'host'){
                    booking_fee = 149.99 + (20 * eaters);
                    console.log(booking_fee);
                }else{
                    booking_fee = 149.99;
                   console.log(booking_fee); 
                }
            }else{
                $('#get_package').hide();
            }
        
        }
        if(package == 6)
        {
          
            if(eaters >= 100){
                $('#get_package').show();
              
                if(payer == 'host'){
                    booking_fee = 199.99 + (20 * eaters);
                    console.log(booking_fee);
                }else{
                    booking_fee = 199.99;
                   console.log(booking_fee); 
                }
            }else{
                $('#get_package').hide();
            }
        
        }

        $('#booking_fee').val(booking_fee)
    //    var temp = $('#booking_fee').val();
      
      document.getElementById("booking_fee").value=booking_fee;
      
    })
});

// $('#get_package').on('click', function(e){
// var package = $('input[name="package_id"]:checked').val();

// var eaters = $('#eater_id').val();

// if(package == 1)
// {
//     $(this).tab()
//     $
//     if(eaters >= 20 && eaters <= 49){
//         console.log(e.target);
//         $(e.target).hide()
//         console.log('Valid')

//     }else
//     {
//         $('#wizardStepseven').removeClass('active').removeClass('show')
//         $('#wizardStepsix').tab('show')
//     }
   
// }
// // else if(package == 2 && eaters < 50 && eaters >99)
// // {
// //    console.log("You much select between 50 to 99");
// // }
// // else if(package == 3 && eaters  >=  100)
// // {
// //    console.log("Your Select more than 100");
// // }
// // if(package == 4 && eaters < 20 && eaters > 49)
// // {
// //    console.log("You much select between 20 to 49");
// // }
// // else if(package == 5 && eaters < 50 && eaters >99)
// // {
// //    console.log("You much select between 50 to 99");
// // }
// // else if(package == 6 && eaters >= 100)
// // {
// //    console.log("Your Select more than 100");
// // }


// });

     (function () {
    var locatorSection = document.getElementById("locator-input-section")
    var input = document.getElementById("autocomplete");

   


    function init() {
        var locatorButton = document.getElementById("locator-button");
        locatorButton.addEventListener("click", locatorButtonPressed)

    }

    function locatorButtonPressed() {
        locatorSection.classList.add("loading")

        navigator.geolocation.getCurrentPosition(function (position) {
                getUserAddressBy(position.coords.latitude, position.coords.longitude)
            },
            function (error) {
                locatorSection.classList.remove("loading")
                alert("The Locator was denied :( Please add your address manually")
            })
    }

    function getUserAddressBy(lat, long) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var address = JSON.parse(this.responseText)
                setAddressToInputField(address.results[0].formatted_address)
            }
            console.log(address);
        };
        xhttp.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + long + "&key=AIzaSyCdAAjnKyYtVFYkgoTM5a5viCFgbWCspUA", true);
        xhttp.send();
    }

    function setAddressToInputField(address) {

        input.value = address
        locatorSection.classList.remove("loading")
    }

    var defaultBounds = new google.maps.LatLngBounds(
        new google.maps.LatLng(8.012723612718569, -1.2205180068975356),
    );

    var options = {
        bounds: defaultBounds
    };
    var autocomplete = new google.maps.places.Autocomplete(input, options);
    

    init()

})();
</script>







