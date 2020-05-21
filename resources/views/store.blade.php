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
    <div class="p-2 store-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Kood</th>
                        <th>Artikkel</th>
                        <th>Hind</th>
                        <th>Kogus</th>
                        <th>Toiming</th>
                    </tr>
                </thead>
                <tbody>                
                    @forelse ($items as $item)  
                    <form action="/store/add" method="POST">
                        @csrf
                        <tr id="good"> 
                            <td> {{ $item[0] }}<input type="hidden" name="id" value="{{$item[0]}}"></td>
                            <td> {{ $item[1] }}</td>
                            <td>{{ $item[2] }}</td>
                            <td><input type="number" placeholder="0" name="amount" id="amount"></td>
                            <td><button class="btn btn-light" id="add">lisa</button></td>
                        </form>                             
                        </tr>
                @empty
                        <p>Ladu tühi! :(</p>
                @endforelse 
                
            </tbody>
        </table>
        @if(Session::has('cart'))
            <p class="alert">Ostukorvis on asju!</p>
            <div>
                <a href="/store/cart" class="btn btn-warning" name="action">Suundu ostukorvi</a>
            </div>
        @else 
            <p>Ostukorv on tühi.</p>
        @endif       
    </div>
</div>
</body>
</html>
