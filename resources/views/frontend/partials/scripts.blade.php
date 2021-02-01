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







