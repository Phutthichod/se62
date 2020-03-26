<?php


use Illuminate\Support\Facades\Route;



Route::get('/login', "MemberController@login");
Route::post('/login', "MemberController@checkLogin");
Route::get('/logout', "MemberController@logout");
Route::post('/borrow', "BorrowingController@borrow");
    Route::delete('/borrow/{id}', "BorrowingController@cancel");
    Route::delete('/cancel/{id}', "BorrowingController@cancel");
    Route::get('/pass/{id}', "BorrowingController@pass");
    Route::get('/borrowed/{id}', "BorrowingController@borrowed");
    Route::get('/return/{id}', "BorrowingController@returnAccessories");
    Route::get('/history', "AcessoriesHistoryController@index");
    Route::get('/static', "StaticController@index");
    Route::get('/catagory', "AccessoryController@index");
    Route::get('/chart', "ChartController@index");
    Route::get('/accessBorrow', "BorrowingController@showBorrowAll");
    Route::get('/static/search', "StaticController@search");
    Route::get('/incompleteBorrow', "BorrowingController@showBorrowStaffAll");

// Route::get('/soa', function () {
//     return view('soa.index');
// });
Route::middleware(['web', 'index'])->group(function () {

    Route::get('/sample', "HistoryController@index");
    Route::get('/historyItem', "AcessoriesHistoryController@index");
    Route::get('/', "IndexController@index");
    Route::get('/{id}', "IndexController@index"); // change Mode (general,admin)

    Route::get('accessoriesAdmin/{id}',"AccessoriesController@indexAdmin") ;
    Route::get('accessoriesUser/{id}',"AccessoriesController@indexUser") ;

    Route::post('/catagories/insert',"AccessoriesController@insertCatagories") ;
    Route::post('/catagories/edit',"AccessoriesController@editCatagories") ;
    Route::post('/catagories/delete',"AccessoriesController@deleteCatagories") ;

    Route::post('/accessories/insert',"AccessoriesController@insertAccessories") ;
    Route::post('/accessories/edit',"AccessoriesController@editAccessories") ;

    Route::group(['prefix' => 'profile'], function () {
        Route::get('me', "MemberController@showProfile");
        Route::post('updateIcon', "MemberController@updateIcon");
        Route::post('updateEmail', "MemberController@updateEmail");
    });

});
//Route::resource('sample','CustomSearchController');
//Route::get('/historyList', "HistoryController@index");
//Route::post('sample/update', 'SampleController@update')->name('sample.update');

//Route::get('sample/destroy/{id}', 'BorrowListController@destroy');
