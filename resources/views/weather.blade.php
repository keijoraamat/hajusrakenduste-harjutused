<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$name}} ilm</title>
    <style>
        html, body {
            background-color: #fff;
            font-weight: 400;
            height: 100vh;
            margin: 25;
        }
        td:hover {background-color: #f5f5f5;}
    </style>
</head>
<body>
@include('header')
  <h3>{{$name}} ilm {{$dt_txt}}</h3> <br>
  <img src="http://openweathermap.org/img/wn/{{$icon}}@2x.png"><br>
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
  <br>
  Õhurõhk {{$pressure}} hPa <br>
  Õhuniiskus {{$humidity}}%
  <p>Päeva pikkus: {{$hours}} tundi ja {{$minutes}} minutit</p><br>
  <p>Andmed {{$isCached}} vahepuhvrist </p>
</body>
</html>
