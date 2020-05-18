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
        <h1>Makse peatati</h1><br>
        <a href="/store/cart" class="btn btn-success m-2" name="action">tagasi ostukorvi</a>
    </div>
</div>
</body>
</html>