<?php

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


Route::get('/login', "LoginController@Index");
Route::post('/login', "LoginController@checkLogin");
Route::get('/logout', "LoginController@logout");
Route::middleware(['web', 'index'])->group(function () {
    Route::get('/index', "IndexController@index");
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/profile', "ShowProfile@index");
    Route::get('/chart', "ChartController@index");
    Route::post('/profile/updateIcon', "ShowProfile@updateIcon");
    Route::post('/profile/updateEmail', "ShowProfile@updateEmail");
    Route::get('/index/{id}', "IndexController@index"); // change Mode (general,admin)
});
