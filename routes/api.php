<?php

use Illuminate\Support\Facades\Route;


Route::get('ping', function () {
    return response()->json('pong', 200);
});
Route::post('login', 'AuthAPIController@login')->name('login');
Route::post('register', 'AuthAPIController@register')->name('register');

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', 'AuthAPIController@logout')->name('logout');
    Route::resource('foods', 'FoodAPIController');
});
