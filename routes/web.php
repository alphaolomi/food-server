<?php



Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index');

// admin/
Route::group(['prefix' => 'admin'], function () {
    Route::resource('foods', 'FoodController');
    Route::resource('users', 'UserController')->execpt('destroy');
});
