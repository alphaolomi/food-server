<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('food', App\Http\Controllers\API\FoodAPIController::class);

    Route::group(['middleware' => ['role:customer']], function () {
        //
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['role:vendor']], function () {
        //
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});
