<?php

namespace App\Http\Controllers;

use App\Bread;
use Illuminate\Http\Request;

class BreadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bread');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bread  $bread
     * @return \Illuminate\Http\Response
     */
    public function show(Bread $bread)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bread  $bread
     * @return \Illuminate\Http\Response
     */
    public function edit(Bread $bread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bread  $bread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bread $bread)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bread  $bread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bread $bread)
    {
        //
    }
}
