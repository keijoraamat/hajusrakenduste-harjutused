<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$name}} ilm</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
@include('header')
<div class="content">
  <h3>{{$name}} ilm {{$dt_txt}}</h3> <br>
  <img src="http://openweathermap.org/img/wn/{{$icon}}@2x.png"><br>
  <div class="flex-center">
  Temperatuur
  <table class="temperature">
      <tr>
          <td>mõõdetud</td>
          <td>tuntav</td>
      </tr>
      <tr>
          <td>{{$temp}} &#8451</td>
          <td>{{$feels_like}} &#8451</td>
      </tr>
  </table>
  </div>
  <br>
  Õhurõhk {{$pressure}} hPa <br>
  Õhuniiskus {{$humidity}}%
  <p>Päeva pikkus: {{$hours}} tundi ja {{$minutes}} minutit</p><br>
  <p>Andmed {{$isCached}} vahepuhvrist </p>
        </div>
</body>
</html>
