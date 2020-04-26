<!DOCTYPE html>
<html>
<head>
    <title>Simple Map</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <style>

        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 80%;
            margin: 15;
            padding: 0;
        }
    </style>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 80%;
                margin: 15;
            }

            .full-height {
                height: 100vh;
            }

            #map {
                height: 100%;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                margin-top: 200px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
</head>
<body>
@include('header')
<form action="/map/change" method="post">
{{ csrf_field() }}
    Pealkiri <input id="name" name="name" placeholder="Lisa pealkiri"><br>
    <input type="hidden" id="id" name="id">
    Laius <input id="lat" name="lat" placeholder="Laiuskraad"><br>
    Pikkus <input id="lng" name="lng" placeholder="Pikkuskraad"><br>
    Kirjeldus <textarea id="description" name="description"></textarea><br>
    @if (Route::has('login'))
        @auth
        <button name="action" value="add">Salvesta</button>
        <button name="action" value="delete">Kustuta</button>
          @else
               <a href="{{ route('login') }}">Salvestamiseks logi sisse</a>
         @endauth
    @endif
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
            document.getElementById("id").value = '';

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
        console.log(place.id);
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
            document.getElementById("id").value = place.id;

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
