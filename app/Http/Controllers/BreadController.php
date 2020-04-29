<?php

namespace App\Http\Controllers;

use App\Bread;
use Illuminate\Http\Request;
use Validator,Redirect,Response,File;

class BreadController extends Controller
{
    public function index()
    {
        $breads = Bread::all();
        return view('bread')->with('breads', $breads);
    }

    public function add(Request $request)
    {
        $bread = new Bread();
        $bread->title = $request->title;
        $bread->decription = $request->description;
        $bread->type = $request->type;
        $bread->origin = $request->origin;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileExt = $file->getClientOriginalExtension();
            $breadCache = $request->title . '.' . $fileExt;
            $file->move('uploads/bread_images', $breadCache);
            $bread->img_url = $breadCache;
        } else {
            $defaultImage = "kakuke.jpg";
            $bread->img_url = $defaultImage;
        }
        $bread->save();
        return redirect("bread");
    }

    public function create()
    {
        return view('createbread');
    }

    public function edit($id)
    {
        $bread = Bread::find($id);
        return view('editbread', compact('bread'));
    }

    public function update(Request $request)
    {
        if ($request->filled('id')) {
            if ($request->action=='update') {
                $this->saveUpdate($request); 
            } elseif ($request->action=='destroy') {
                Bread::destroy($request->id);
            }
        }
        return $this->index();
    }

    protected function saveUpdate($request) {
        $bread = Bread::find($request->id);
        $bread->title = $request->title;
        $bread->decription = $request->description;
        $bread->type = $request->type;
        $bread->origin = $request->origin;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileExt = $file->getClientOriginalExtension();
            $breadCache = $request->title . '.' . $fileExt;
            $file->move('uploads/bread_images', $breadCache);
            $bread->img_url = $breadCache;
        } 
        $bread->save(); 
    }

    public function allBreadsv1($limit) {
        define("CACHE_TIME", 7200);
        $prodServer = "hajusrakendusete-harjutused.herokuapp.com";
        $imgDir = "uploads/bread_images";
        $breadCache='./bread_cache.json';
        $serviceableBreads = [];
        if ( file_exists($breadCache) && (time() - filemtime($breadCache) < CACHE_TIME) ) {
            $breads = file_get_contents($breadCache);
          } else {
            $breads = Bread::all();
            $file = fopen($breadCache, 'w');
            fwrite($file, json_encode($breads));
            fclose($file);
          }
          $decodedCache = json_decode($breads);
          if (Bread::count()<$limit ) {
              $limit = Bread::count();
          }
          for ($i=0; $i < $limit; $i++) { 
            $bread=[];
            $bread['id'] =$i;
            $bread['title'] = $decodedCache[$i]->title; 
            $bread['img_url'] = $prodServer . '/'. $imgDir . '/' . $decodedCache[$i]->img_url;
            $bread['description'] = $decodedCache[$i]->decription; 
            $bread['type'] = $decodedCache[$i]->type;
            $bread['origin'] = $decodedCache[$i]->origin;
            $serviceableBreads[] = $bread;
          }     
        return json_encode($serviceableBreads);
    }

}
