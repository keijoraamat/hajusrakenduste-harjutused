<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Harjutused</title>

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

        <div class="flex-center position-ref full-height">
        @include('header')
            <div class="content">
                <ul>
                    <h2><a href="{{ url('/api') }}">5. Vabalt valida lemmik teema ja luua sellele API</a></h2>
                    <li>Luua tabel my_favorite_subject (id, title, image, description, +2 teema kohast välja)</li>
                    <li>Luua ankeet (title, description, image, +2 teema kohast välja)</li>
                    <li>Luua väljund sisestatud teemades. (JSON) Väljund peab sisaldame vähemalt ühte parameetrit (limit)</li>
                    <li>Luua leht, mis loeb kaas õpilaste teemasid.</li>
                    <li>Cache iga teema kohta</li>        
                </ul>

                
            </div>
        </div>
    </body>
</html>
