<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function __invoke() {
        $friends = [
            ['url'=>'https://ta18toose.itmajakas.ee/Hajusrakendused/lemmikAPI/api.php?limit=sadakolm', 'name'=>'Merike'],
            ['url'=>'https://ta18prei.itmajakas.ee/api/api.php', 'name'=>'Taavi'],
        ];
        //['url'=>'https://ta18prei.itmajakas.ee/api/api.php', 'name'=>'Taavi'],
        $friendsApis = [];
    
        foreach ($friends as $friend) {
            $friendApi = $this->getFriendApi($friend['url'], $friend['name']);
            if (is_null($friendApi)) {
                $friendApi [0] = [$friend['name'].' api on vist katki :('];
            }
            $friendsApis[] = [$friend['name']=>$friendApi]; 
        }
 
        return view('api')->withFriends($friendsApis);
    }

    protected function getFriendApi(String $url, String $name)
    {
        $cacheTime = 3600;
        $fileName='./'.$name.'_api_cache.json';
    
        if ( file_exists($fileName) && (time() - filemtime($fileName) < $cacheTime) ) {
          $content = file_get_contents($fileName);
        } else {
          $content = file_get_contents($url);
          $file = fopen($fileName, 'w');
          fwrite($file, $content);
          fclose($file);
        }
        return json_decode($content);
    }
}
