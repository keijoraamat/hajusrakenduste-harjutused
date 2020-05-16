<?php

use App\Http\Controllers\MapController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function() {
    return view('welcome');
});
Route::get('/weather', 'WeatherController');
Route::get('/map', 'MapController@index');
Route::post('/map/change', 'MapController@changeMarker');
Route::post('/login', 'LoginController@logIn');
Route::get('/map/markers', 'MapController@getMarkers');
Route::get('/saveloc', 'MapController@addLocation');
Route::get('/locs', 'MapController@showTable');
Route::get('logout', 'UserController@logout');
Route::get('/edit', 'MapController@editMarker');
Route::get('/bread', 'BreadController@index');
Route::get('/bread/{id}', 'BreadController@edit');
Route::get('/newbread', 'BreadController@create');
Route::post('/bread/add', 'BreadController@add');
Route::post('/bread/update', 'BreadController@update');
Route::get('/api/v1/limit={amount}', 'BreadController@allBreadsv1');
Route::get('/store', 'StoreController@index');

Auth::routes([
    'register' => false,
]);

Route::get('/home', 'HomeController')->name('home');
