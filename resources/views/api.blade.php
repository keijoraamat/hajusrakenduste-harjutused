<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Harjutused</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <style>
            .pic{
                max-width: 100px;
            }
        </style>
    </head>
    <body>

        <div class="flex-center position-ref full-height">
        @include('header')
        <div class="content p-2">
        <p><a href="/bread">ankeet</a>, mille kaudu sisestasin andmed API kaudu väljastamiseks</p>
        @forelse ($friends as $friend)
            @foreach ($friend as $name => $responses)
                <strong>{{$name}}</strong> <br> 
                <table>
                @forelse ($responses as $response)
                   <div class="d-flex">
                    @foreach ($response as $item)
                        @if ( substr($item, 0, 4) == 'http')
                            <div class="pic">
                                <img src="{{$item}}" alt="{{ $name }} laaditud pilt" class="img-fluid">
                            </div>                          
                        @else
                        {{ $item }}
                        @endif 
                    @endforeach
                    </div>
                    <hr>
                @empty
                    
                @endforelse
                </table>
            @endforeach
            
        @empty
            
        @endforelse
        </div>
        </div>
    </body>
</html>
