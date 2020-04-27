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
            $fileName = $request->title . '.' . $fileExt;
            $file->move('uploads/bread_images', $fileName);
            $bread->img_url = $fileName;
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
            $fileName = $request->title . '.' . $fileExt;
            $file->move('uploads/bread_images', $fileName);
            $bread->img_url = $fileName;
        } 
        $bread->save(); 
    }

    public function allBreadsv1($limit) {
        $breads = Bread::take($limit)->get();
        return $breads->toJson();
    }
}
