<?php

use Illuminate\Support\Facades\Route;


<<<<<<< HEAD
Route::get('/login',"MemberController@login");
Route::post('/login',"MemberController@checkLogin");
Route::get('/logout',"MemberController@logout");
Route::get('/borrow',"BorrowingController@borrow");
Route::get('/cancel/{id}',"BorrowingController@cancel");
Route::get('/pass/{id}',"BorrowingController@pass");
Route::get('/borrowed/{id}',"BorrowingController@borrowed");
Route::get('/return/{id}',"BorrowingController@returnAccessories");

=======
Route::get('/login', "MemberController@login");
Route::post('/login', "MemberController@checkLogin");
Route::get('/logout', "MemberController@logout");
Route::post('/borrow', "BorrowingController@borrow");
Route::delete('/borrow/{id}', "BorrowingController@cancel");
Route::delete('/cancel/{id}', "BorrowingController@cancel");
Route::get('/pass/{id}', "BorrowingController@pass");
Route::get('/borrowed/{id}', "BorrowingController@borrowed");
Route::get('/return/{id}', "BorrowingController@returnAccessories");
Route::get('/history', "HistoryController@index");
Route::get('/static', "StaticController@index");
Route::get('/catagory', "AccessoryController@index");
Route::get('/chart', "ChartController@index");
<<<<<<< HEAD
Route::get('/productborrow', "ProductBorrowController@index");
Route::get('/static/search', "StaticController@search");
=======
Route::get('/accessBorrow', "BorrowingController@showBorrowAll");
Route::get('/static/search', "StaticController@static");
>>>>>>> 74e97dc2da6d693e3a19eeac09cfaff8165c5e3e
>>>>>>> 4fd0cb3d2c45bdd65935296531961273fb3dc83b
// Route::get('/soa', function () {
//     return view('soa.index');
// });
Route::middleware(['web', 'index'])->group(function () {

    Route::get('/sample', "HistoryController@index");
    Route::get('/historyItem', "AcessoriesHistoryController@index");
    Route::get('/', "IndexController@index");
    Route::get('/{id}', "IndexController@index"); // change Mode (general,admin)

<<<<<<< HEAD
    Route::get('accessoriesAdmin/{id}',"AccessoriesController@indexAdmin") ;
    Route::get('accessoriesUser/{id}',"AccessoriesController@indexUser") ;

    Route::post('/catagories/insert',"AccessoriesController@insertCatagories") ;
    Route::post('/catagories/edit',"AccessoriesController@editCatagories") ;
    Route::post('/catagories/delete',"AccessoriesController@deleteCatagories") ;

    Route::post('/accessories/insert',"AccessoriesController@insertAccessories") ;
    Route::post('/accessories/edit',"AccessoriesController@editAccessories") ;

=======
    Route::group(['prefix' => 'profile'], function () {
        Route::get('me', "MemberController@showProfile");
        Route::post('updateIcon', "MemberController@updateIcon");
        Route::post('updateEmail', "MemberController@updateEmail");
    });
>>>>>>> 4fd0cb3d2c45bdd65935296531961273fb3dc83b
});
//Route::resource('sample','CustomSearchController');
//Route::get('/historyList', "HistoryController@index");
//Route::post('sample/update', 'SampleController@update')->name('sample.update');

//Route::get('sample/destroy/{id}', 'BorrowListController@destroy');
