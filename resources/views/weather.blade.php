<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $json->city->name;?> ilm</title>
</head>
<body>
<h3><?php echo $json->city->name;?> ilm <?php echo $json->list[0]->dt_txt;?></h3> <br>
<img src="http://openweathermap.org/img/wn/<?php echo $json->list[0]->weather[0]->icon;?>@2x.png">
    <table>
        <tr>
            <th>temperatuur</th>
            <th> </th>
        </tr>
        <tr>
            <td>mõõdetud: </td>
            <td>tuntav: </td>
        </tr>
        <tr>
            <td><?php echo $json->list[0]->main->temp;?> &#8451</td>
            <td><?php echo $json->list[0]->main->feels_like;?>&#8451</td>
        </tr>
    </table>
    Õhurõhk <?php echo $json->list[0]->main->pressure;?> hPa <br>
    Õhuniiskus <?php echo $json->list[0]->main->humidity;?>%
    <p>Päeva pikkus: <?php echo date("H", ($json->city->sunrise-$json->city->sunset));?> tundi ja <?php echo date("i", ($json->city->sunrise-$json->city->sunset));?> minutit</p>
<?php
    //<form method="POST">
    //    <input id="phi" name="latitude" placeholder="kraadi ekvaatorist"> <br>
    //    <input id="lamda" name="longitude" placeholder="kraadi 0 meridiaanist"><br>
    //    <button name="action" value="change_loc">Hangi ilma andmed</button>
    //</form>
?>
</body>
</html>
