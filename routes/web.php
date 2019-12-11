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
Route::post('/miejscowosci','LocationsController@store');
Route::patch('/miejscowosci/{location}','LocationsController@update');
Route::delete('/miejscowosci/{location}','LocationsController@destroy');

Route::post('/wojewodztwa','VoivodeshipsController@store');
Route::patch('/wojewodztwa/{viovodeship}','VoivodeshipsController@update');
Route::delete('/wojewodztwa/{viovodeship}','VoivodeshipsController@destroy');

