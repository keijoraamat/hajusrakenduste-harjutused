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
<form action="/save" method="post">
{{ csrf_field() }}
    <input id="name" name="name" placeholder="Lisa pealkiri"><br>
    <input id="lat" name="lat" placeholder="Laiuskraad"><br>
    <input id="lng" name="lng" placeholder="Pikkuskraad"><br>
    <textarea id="description" name="description"></textarea><br>
    <button name="action" value="add">Salvesta</button>
</form>

<hr>

<div id="map"></div>
<script>
    var map;
    function initMap() {

        var start = {
            lat: 58.760,
            lng: 25.152
        };

        map = new google.maps.Map(document.getElementById('map'), {
            center: start,
            zoom: 8
        });

        map.addListener('click', function(event) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            var newPlace = {lat: lat, lng: lng};
            addMarker(newPlace, null);

            document.getElementById("lat").value = lat;
            document.getElementById("lng").value = lng;
            document.getElementById("name").value = '';
            document.getElementById("description").value = '';

        });

        fetch('/map/markers')
            .then((response) => {
                return response.json();
            })
            .then((data) => {
                for (k in data) {
                    var place = data[k];
                    addMarker(place);
                }
            });

    }

    function addMarker(place) {
        let marker = new google.maps.Marker({
            position: place,
            draggable: true,
            map: map,
            title: name
        });
        let infowindow = new google.maps.InfoWindow({
            content: '<b>'+place.name+'</b><br>'+place.description
         });
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        })
        marker.addListener('click', function(event) {
            var lat = event.latLng.lat();
            var lng = event.latLng.lng();
            document.getElementById("name").value = place.name;
            document.getElementById("description").value = place.description;
            document.getElementById("lat").value = lat;
            document.getElementById("lng").value = lng;

        });
    }

    var infowindow = new google.maps.InfoWindow({
          content: contentString
        });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCCrW935XlJXkoVbFCucxYnrLDyzpSrQ10&callback=initMap"
        async defer></script>
</body>
</html>
