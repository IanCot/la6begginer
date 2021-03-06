<?php

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

Route::post('/organizatorzy','OrganizerController@store');
Route::patch('/organizatorzy/{organizer}','OrganizerController@update');
Route::delete('/organizatorzy/{organizer}','OrganizerController@destroy');

Route::post('/biegi','RunController@store');
Route::patch('/biegi/{run}','RunController@update');
Route::delete('/biegi/{run}','RunController@destroy');

Route::post('/lokalizacje','LocationsController@store');
Route::patch('/lokalizacje/{location}','LocationsController@update');
Route::delete('/lokalizacje/{location}','LocationsController@destroy');

Route::post('/miejscowosci','CityController@store');
Route::patch('/miejscowosci/{city}','CityController@update');
Route::delete('/miejscowosci/{city}','CityController@destroy');

Route::post('/wojewodztwa','VoivodeshipsController@store');
Route::patch('/wojewodztwa/{viovodeship}','VoivodeshipsController@update');
Route::delete('/wojewodztwa/{viovodeship}','VoivodeshipsController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
