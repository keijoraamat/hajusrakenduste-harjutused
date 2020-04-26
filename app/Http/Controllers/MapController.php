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

    public function changeMarker(Request $clikedPoint) {
      if (($clikedPoint->has('id')) and ($clikedPoint->action == 'add')) {
        $this->updateMarker($clikedPoint);
      } elseif (($clikedPoint->has('id'))and ($clikedPoint->action == 'delete')) {
        $this->deleteMarker($clikedPoint);
      } elseif ($clikedPoint->action == 'add'){
        $this->createMarker($clikedPoint);
      }
      return redirect('/map');
    }

    public function getMarkers() {
      $locations = DB::table('markers')->select('*')->get();
      // not so nice workaround, because laravel want's to convert float to string in model.
      $markers = [];
      foreach ($locations as $loc) {
        $marker=[];
        $marker['id']=$loc->id;
        $marker['name']=$loc->name;
        $marker['lat']=floatval($loc->lat);
        $marker['lng']=floatval($loc->lng);
        $marker['description']=$loc->description;
        $markers[] = $marker;
      }
      return json_encode($markers); 
    }

    public function updateMarker(Request $request){
      $newMarker = Marker::find($request->id);
      $newMarker->lat = $request->lat;
      $newMarker->lng = $request->lng;
      $newMarker->name = $request->name;
      $newMarker->description = $request->description;
      $newMarker->save();
      return redirect('/map');
    }

    public function deleteMarker(Request $request){
      if (($request->id)<0) {
        Marker::where('id', $request->id)->delete();
      }
      return redirect('/map');
    }

    public function createMarker(Request $request){
      $marker = new Marker();
      $marker ->name = $request->name;
      $marker ->lat =  $request->lat;
      $marker ->lng = $request->lng;
      $marker ->description = $request->description;
      $marker->save();
      return redirect('/map');
    }
}
