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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'BladeController@index');
Route::get('/medicine', 'BladeController@medicine');
Route::get('/cosmetic', 'BladeController@cosmetic');
Route::get('/health', 'BladeController@health');
