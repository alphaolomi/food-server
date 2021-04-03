<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([]);
Route::redirect('/', '/login');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/change-password', [App\Http\Controllers\ProfileController::class, 'changePassword'])->name('change-password');
    Route::post('/change-avatar', [App\Http\Controllers\ProfileController::class, 'changeAvatar'])->name('change-avatar');

    Route::resource('food', App\Http\Controllers\FoodController::class);

    Route::group(['middleware' => ['role:customer']], function () {
        //
    });

    Route::group(['prefix'=>'admin','middleware' => ['role:landlord|sub-landlord']], function () {

        //
    });
    Route::group(['prefix'=>'admin','middleware' => ['role:super-admin']], function () {
        //
    });
});


