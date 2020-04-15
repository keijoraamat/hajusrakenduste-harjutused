<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 80%;
            margin: 15;
            padding: 0;
        }
    </style>
</head>
<body>
@include('header')
<form method="post">
    <input name="title" placeholder="Add title"><br>
    <input id="lat" name="latitude" placeholder="Add latitude"><br>
    <input id="lng" name="longitude" placeholder="Add longitude"><br>
    <textarea name="description"></textarea><br>
    <button name="action" value="add">Add marker</button>
</form>

<hr>

<div id="map"></div>
<script>
    var map;
    function initMap() {

        var start = {
            lat: 58.247537,
            lng: 22.479283
        };

        map = new google.maps.Map(document.getElementById('map'), {
            center: start,
            zoom: 15
        });

        map.addListener('click', function(event) {


            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            var newPlace = {lat: lat, lng: lng};
            addMarker(newPlace, null);

            document.getElementById("lat").value = lat;
            document.getElementById("lng").value = lng;

        });

        fetch('json.php')
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                for (k in data) {
                    console.log(data[k]);
                    var place = data[k];
                    var image = 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png';


                    addMarker(place, image);
                }
            });

    }

    function addMarker(place, image) {
        new google.maps.Marker({
            position: place,
            map: map,
            icon: image
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap"
        async defer></script>
</body>
</html>
