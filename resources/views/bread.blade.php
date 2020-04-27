<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Harjutused</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    </head>
    <body>

        <div class="flex-center position-ref full-height">
        @include('header')
            <div class="content">
                <a href="/newbread" class="btn btn-primary">Lisa</a>
                <table class="table">
                <thead class="thead-light">
                    <tr>
                    <th scope="col">Nimetus</th>
                    <th scope="col">Tüüp</th>
                    <th scope="col">Algupära</th>
                    <th scope="col">Kirjeldus</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Toimeta</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($breads as $bread)
                    <tr>
                    <th >{{ $bread->title}}</th>
                    <th >{{ $bread->type}}</th>
                    <th >{{ $bread->origin}}</th>
                    <th >{{ $bread->decription}}</th>
                    <th ><img src="{{ asset('uploads/bread_images/' . $bread->img_url) }}" class="img-fluid"> </th>
                    <th > 
                        <a href="/bread/{{$bread->id}}" class="btn btn-warning">Muuda</a>
                    </th>
                    </tr>
                    @endforeach
                </tbody>
                </table>
                </div>
            </div>
        </div>
    </body>
</html>
