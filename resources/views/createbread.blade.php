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
                <div class="float input_form">
                    <form action="/bread/add" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Nimetus</label>
                            <input id="name" name="title" placeholder="pagaritoote nimi">
                        </div>
                        <div class="form-group">
                            <label for="description">Kirjeldus</label> 
                            <textarea id="description" name="description" placeholder="kirjelda paari lausega pagaritoodet"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="type">Tüüp</label> 
                            <input id="type" name="type" placeholder="millist tüüpi toode?">
                        </div>
                        <div class="form-group">
                            <label for="origin">Algupära</label> 
                            <input id="origin" name="origin" placeholder="päritolu?">
                        </div>
                        <label>Foto</label> 
                        <div class="input-group">
                            <label for="image">Vali pildi fail</label>
                            <input  type="file" id="image" name="image" >
                        </div>
                        <button name="action" value="add">Salvesta</button>
                    </form>
                    
                </div>
            </div>
        </div>
    </body>
</html>
