<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ostukorv</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <style>
            .store-table{
                max-width: 600px;
            }
        </style>
</head>
<body>
@include('header')
<div class="content">
    <div class="d-flexi p-2 store-table">
        <table class="table">
            <tbody>
                <thead>
                    <tr>
                        <th scope="col">Artikkel</th>
                        <th>Hind</th>
                        <th>Kogus</th>
                        <th></th>
                    </tr>
                </thead>
                @forelse ($items as $item => $price)
                <tr> 
                    <th scope="row"> {{ $item }}</th>
                    <th>{{ $price }}</th>
                    <th><input type="number" placeholder="0"></th>
                    <th><a href="#" class="btn">Lisa korvi</a></th>
                </tr>
                @empty
                        <p>Ladu tühi! :(</p>
                @endforelse  
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
