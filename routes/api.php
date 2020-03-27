<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['']], function () {

    Route::get('ping', function (){
        return 'pong';
    });
    Route::resource('foods', 'FoodAPIController');

});

