<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$name}} ilm</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
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
