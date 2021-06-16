<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::resource('food', FoodAPIController::class)->only(['index','show']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('food', FoodAPIController::class)->except(['index','show']);

    Route::group(['middleware' => ['role:customer']], function () {
        //
    });

    Route::group(['prefix' => 'admin', 'middleware' => ['role:vendor']], function () {
        //
    });

    Route::post('/logout', [AuthController::class, 'logout']);
});
