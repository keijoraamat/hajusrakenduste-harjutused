<?php

use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController');
Route::get('/weather', 'WeatherController');
Route::get('/map', 'MapController@index');
Route::post('/save', 'MapController@addMarker');
Route::get('/map/markers', 'MapController@getMarkers');
Route::get('/saveloc', 'MapController@addLocation');
Route::get('/locs', 'MapController@showTable');
