<?php

namespace App\Http\Controllers;

use App\Location;
use App\Marker;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index(){
      return view('map');
    }

    public function addMarker(Request $clikedPoint) {
      dd($clikedPoint);
      $marker = new Marker();
      $marker ->name = $clikedPoint->name;
      $marker ->lat =  $clikedPoint->lat;
      $marker ->lng = $clikedPoint->lng;
      $marker ->description = $clikedPoint->description;
      $marker->save();
      return redirect('/map');
    }

    public function getMarkers() {
      $locations = DB::table('markers')->select('*')->get();
      // not so nice workaround, because laravel want's to convert float to string in model.
      $markers = [];
      foreach ($locations as $loc) {
        $marker=[];
        $marker['name']=$loc->name;
        $marker['lat']=floatval($loc->lat);
        $marker['lng']=floatval($loc->lng);
        $marker['description']=$loc->description;
        $markers[] = $marker;
      }
      return json_encode($markers); 
    }


    //public function showTable() {
      //$locations = DB::table('markers')->select('lat','lng')->get();
      // not so nice workaround, because laravel want's to convert float to string in model.
      //$markers = [];
      //foreach ($locations as $loc) {
        //$marker=[];
        //$marker['lat']=floatval($loc->lat);
        //$marker['lng']=floatval($loc->lng);
        //$markers[] = $marker;
      //}
      //return json_encode($markers); 
    //}
    
}
