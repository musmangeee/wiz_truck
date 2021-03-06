$(document).ready(function () {

    var locations = [
        ['Location 1 Name', 'Sakaman, Ghanna', 'Location 1 URL'],
        ['Location 2 Name', 'Kumsai, Ghanna', 'Location 2 URL'],
        ['Location 3 Name', 'Tamale, Ghanna', 'Location 3 URL']
    ];

    var geocoder;
    var map;
    var bounds = new google.maps.LatLngBounds();

    function initialize() {
        map = new google.maps.Map(
            document.getElementById("business_map_canvas"), {
                center: new google.maps.LatLng(5.55602, -0.1969),
                zoom: 13,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            });
        geocoder = new google.maps.Geocoder();

        for (i = 0; i < locations.length; i++) {


            geocodeAddress(locations, i);
        }
    }
    google.maps.event.addDomListener(window, "load", initialize);

    function geocodeAddress(locations, i) {
        var title = locations[i][0];
        var address = locations[i][1];
        var url = locations[i][2];
        geocoder.geocode({
                'address': locations[i][1]
            },

            function (results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    var marker = new google.maps.Marker({
                        icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
                        map: map,
                        position: results[0].geometry.location,
                        title: title,
                        animation: google.maps.Animation.DROP,
                        address: address,
                        url: url
                    })
                    infoWindow(marker, map, title, address, url);
                    bounds.extend(marker.getPosition());
                    map.fitBounds(bounds);
                } else {
                    alert("geocode of " + address + " failed:" + status);
                }
            });
    }

    function infoWindow(marker, map, title, address, url) {
        google.maps.event.addListener(marker, 'click', function () {
            var html = "<div><h3>" + title + "</h3><p>" + address + "<br></div><a href='" + url + "'>View location</a></p></div>";
            iw = new google.maps.InfoWindow({
                content: html,
                maxWidth: 350
            });
            iw.open(map, marker);
        });
    }

    function createMarker(results) {
        var marker = new google.maps.Marker({
            icon: 'http://maps.google.com/mapfiles/ms/icons/blue.png',
            map: map,
            position: results[0].geometry.location,
            title: title,
            animation: google.maps.Animation.DROP,
            address: address,
            url: url
        })
        bounds.extend(marker.getPosition());
        map.fitBounds(bounds);
        infoWindow(marker, map, title, address, url);
        return marker;
    }


});