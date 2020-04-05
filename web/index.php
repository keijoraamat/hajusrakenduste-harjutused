<?php
    print_r($_POST);
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    $phi =floatval( filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING));
    $lamda = floatval(filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_STRING));
    $fileName = './cache.json';
    $key=json_decode(file_get_contents('./key.json'));
    $api_key = $key->key;
    define("CACHE_TIME", 300);
    if (isset($action)) {
        $error = [];
        if (empty($phi)) {
            $error['phi'] = 'Kagus ekvaatorist peab olema antud';
        }
        if (empty($lamda)) {
            $error['lambda'] = 'Kaugus null merdiaanist peab olema antud';
        }
        if (empty($error)) {
            $url = 'http://api.openweathermap.org/data/2.5/forecast?id=524901&APPID='.$api_key.'&lat=' . $phi . '&lon='. $lamda .'&units=metric';

            $cacheTime = 300;
            $content = file_get_contents($url);
        
                $file = fopen($fileName, 'w');
                fwrite($file, $content);
                fclose($file);
            $json = json_decode($content);
            }
            
    } else {
        $url = 'http://api.openweathermap.org/data/2.5/forecast?id=524901&APPID='.$api_key.'&lat=58.2550&lon=22.4919&units=metric';

        
            if ( file_exists($fileName) && (time() - filemtime($fileName) < CACHE_TIME) ) {
                $content = file_get_contents($fileName);
            } else {
                $content = file_get_contents($url);
        
                $file = fopen($fileName, 'w');
                fwrite($file, $content);
                fclose($file);
        
            $json = json_decode($content);
        }
    }

    //var_dump($json->list[0]->dt_txt);
    //var_dump($json);
?>

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

    <form method="POST">
        <input id="phi" name="latitude" placeholder="kraadi ekvaatorist"> <br>
        <input id="lamda" name="longitude" placeholder="kraadi 0 meridiaanist"><br>
        <button name="action" value="change_loc">Hangi ilma andmed</button>
    </form>
    <?php  
    echo $phi;
    echo "<br>";
    echo $lamda; 
    echo "<br>";
    echo $url;
    ?>
</body>
</html>