<?php

use Illuminate\Support\Facades\Route;


Route::get('/login', "MemberController@login");
Route::post('/login', "MemberController@checkLogin");
Route::get('/logout', "MemberController@logout");
Route::get('/borrow', "BorrowingController@borrow");
Route::get('/cancel/{id}', "BorrowingController@cancel");
Route::get('/pass/{id}', "BorrowingController@pass");
Route::get('/borrowed/{id}', "BorrowingController@borrowed");
Route::get('/return/{id}', "BorrowingController@returnAccessories");
Route::get('/history', "HistoryController@index");
Route::get('/catagory', "AccessoryController@index");
Route::get('/chart', "ChartController@index");
// Route::get('/soa', function () {
//     return view('soa.index');
// });
Route::middleware(['web', 'index'])->group(function () {
    Route::get('/sample', "HistoryController@index");
    Route::get('/historyItem', "AcessoriesHistoryController@index");
    Route::get('/', "IndexController@index");
    Route::get('/{id}', "IndexController@index"); // change Mode (general,admin)

    Route::group(['prefix' => 'profile'], function () {
        Route::get('me', "MemberController@showProfile");
        Route::post('updateIcon', "MemberController@updateIcon");
        Route::post('updateEmail', "MemberController@updateEmail");
    });
});

//Route::resource('sample','CustomSearchController');

//Route::post('sample/update', 'SampleController@update')->name('sample.update');

//Route::get('sample/destroy/{id}', 'BorrowListController@destroy');
