<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Harjutused</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>

        <div class="flex-center position-ref full-height">
        @include('header')

            <div class="content p-2">
            
            <h2><a href="{{ url('/weather') }}">1. Vabalt valitud ilma API</a></h2>
        <ul>
            <li>Ühendada API-ga ja saada info (näiteks formaat JSON)</li>
            <li>Andmed cache-ida</li>
            <li>Väljastada info (võimalusel koos pildiga)</li>
            <li>Näideks: <a href="https://openweathermap.org/price" target="_blank">https://openweathermap.org/price</a></li>
        </ul>
        <h2><a href="{{ url('/map') }}">2. Google Maps API</a></h2>
        <ul>
            <li>Luua tabel markers (id, name, latitude, longitude, description, added, edited)</li>
            <li>CRUD markerile. (name, latitude, longitude, description)</li>
            <li>Luua google map</li>
            <li>Lisada markerid map-ile</li>
            <li>Click mapil võimaldab salvestada markerit</li>
            <li>Tutorial: <a href="https://developers.google.com/maps/documentation/javascript/tutorial" target="_blank">https://developers.google.com/maps/documentation/javascript/tutorial</a></li>
        </ul>
        <h2><a href="http://harjutus-3-blogi.herokuapp.com/"> 3. Laravel - projekti loomine Uudised. Kommentaaride CRUD</a></h2>
        <ul>
            <li>Luua project Blog</li>
            <li>Luua audentimine</li>
            <li>Luua migration create_blog_table (title, description)</li>
            <li>CRUD blog-ile</li>
            <li>Võimalus lisada kommentaare. Ning saab kustutada (admin).</li>
            <li>Tutorial: <a href="https://laracast.com" target="_blank">https://laracast.com</a></li>
        </ul>
        <h2><a href="{{ url('/store') }}">4. Pangalingid - luua ostukorvi</a></h2>
        <ul>
            <li>Luua toote valiku leht (vähemalt 9 toodet, saab valida kogust)</li>
            <li>Luua ostukorv. Saab muuta koguseid ja kustutada tooteid</li>
            <li>Luua maksmise eelne leht (eesnimi, perenimi, email, telefon), lingid mine maksma</li>
            <li>Maksmisest tagasi tulles vastavalt tulemusele kas tühjendada ostukorv või mitte.</li>
            <li>Keskond: <a href="https://github.com/BitWeb/Pangalink.net">Github</a>; <a href="http://janek.itmajakas.ee/pmg/pangalink-net_amd64.exe" target="_blank">Windows</a></li>
        </ul>
        <h2><a href="{{ url('/api') }}">5. Vabalt valida lemmik teema ja luua sellele API</a></h2>
        <ul>
            <li>Luua tabel my_favorite_subject (id, title, image, description, +2 teema kohast välja)</li>
            <li><a href="{{ url('/bread') }}">Luua ankeet (title, description, image, +2 teema kohast välja)</a></li>
            <li>Luua väljund sisestatud teemades. (JSON) Väljund peab sisaldame vähemalt ühte parameetrit (limit)</li>
            <li>Luua leht, mis loeb kaas õpilaste teemasid.</li>
            <li>Cache iga teema kohta</li>        
        </ul>
            </div>
        </div>
    </body>
</html>
