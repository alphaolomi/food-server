<?php

use Illuminate\Support\Facades\Route;

// api/v1
Route::group(['prefix' => 'v1'], function () {
    Route::resource('foods', 'FoodAPIController');
    Route::resource('users', 'UserAPIController')->expect('destroy');
});
