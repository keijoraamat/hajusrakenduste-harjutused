<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
  public function __invoke() {
    $api_key = getenv('api_key');
    define("CACHE_TIME", 300);
    $fileName='./weather_cache.json';
    $url = 'http://api.openweathermap.org/data/2.5/forecast?id=524901&APPID='.$api_key.'&lat=58.2550&lon=22.4919&units=metric';

    if ( file_exists($fileName) && (time() - filemtime($fileName) < CACHE_TIME) ) {
      $content = file_get_contents($fileName);
      $isCached="on";
    } else {
      $content = file_get_contents($url);
      $file = fopen($fileName, 'w');
      fwrite($file, $content);
      fclose($file);
      $isCached="ei ole";
    }

    $json = json_decode($content);
    $data = array(
      'name'=>$json->city->name,
      'icon'=>$json->list[0]->weather[0]->icon,
      'dt_txt'=>$json->list[0]->dt_txt,
      'temp'=>$json->list[0]->main->temp,
      'feels_like'=>$json->list[0]->main->feels_like,
      'pressure'=>$json->list[0]->main->pressure,
      'humidity'=>$json->list[0]->main->humidity,
      'hours'=>date("H",($json->city->sunset-$json->city->sunrise)),
      'minutes'=>date("i", ($json->city->sunset-$json->city->sunrise)),
      'isCached'=>$isCached
      );
    return view('weather', $data);
}

}
