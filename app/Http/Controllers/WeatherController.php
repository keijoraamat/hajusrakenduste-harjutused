<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
  public function index() {
    //$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    //$phi =floatval( filter_input(INPUT_POST, 'latitude', FILTER_SANITIZE_STRING));
    //$lamda = floatval(filter_input(INPUT_POST, 'longitude', FILTER_SANITIZE_STRING));
    $api_key = getenv('api_key');
    define("CACHE_TIME", 300);
    $fileName='./cache.json';
    $url = 'http://api.openweathermap.org/data/2.5/forecast?id=524901&APPID='.$api_key.'&lat=58.2550&lon=22.4919&units=metric';


            //if ( file_exists($fileName) && (time() - filemtime($fileName) < CACHE_TIME) ) {
            //    $content = file_get_contents($fileName);
            //} else {
            //    $content = file_get_contents($url);
            //    $file = fopen($fileName, 'w');
            //    fwrite($file, $content);
            //    fclose($file);
            $content = file_get_contents($url);
            $json = json_decode($content);
        //}


    //var_dump($json->list[0]->dt_txt);
    //var_dump($json);

  return view('weather', compact('json'));
}

}
