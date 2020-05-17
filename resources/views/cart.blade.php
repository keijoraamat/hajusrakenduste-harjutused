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
        @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            <a href="/store" class="btn btn-success">Vali meelepärst</a>
        @endif
        @if(Session::has('cart'))
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Kood</th>
                    <th>Artikkel</th>
                    <th>Tüki hind</th>
                    <th>Kogus</th>
                    <th>Rea summa</th>
                </tr>
            </thead>
            <tbody>                
                @forelse ($items as $item)  
                    @csrf
                    <tr id="good"> 
                        <td>{{ $item[0] }}<input type="hidden" name="id" value="{{$item[0]}}"></td>
                        <td>{{ $item[1] }}</td>
                        <td>{{ $item[2] }}</td>
                        <td>{{ $item[3] }}</td>
                        <td>{{ $item[4] }} €</td>                           
                    </tr>
            @empty
                    <p>Ostukorv tühi :(</p>
            @endforelse          
            </tbody>
            </table>
        <div class="d-flex justify-content-end">
         <b class="d-inline-flex p-2">Ostkorv kokku </b>
         <h3 class="pr-4">{{$sum}}</h3>
        </div>
        <div class="d-flex justify-content-end">
            <form action="/store/discardcart"  method="POST">
                @csrf
                <button type="submit" class="btn btn-danger m-2">Kustuta ostukorv</button>
            </form>
            <a href="/store/payment" class="btn btn-success m-2" name="action">Suundu maksma</a>
        </div>
        @endif
    </div>
</div>
</body>
</html>