<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes([]); // ['verify' => true]
Route::redirect('/', '/login');

// Route::view('/under-construction', 'under-construction')->name('under-construction');

Route::get('login/{provider}', [App\Http\Controllers\Auth\LoginWithController::class,'redirectToProvider'])->name('login.provider');
Route::get('login/{provider}/callback', [App\Http\Controllers\Auth\LoginWithController::class,'handleProviderCallback'])->name('login.provider.callback');


// Route::resource('food', App\Http\Controllers\FoodController::class)->only(['index']);

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::post('/change-password', [App\Http\Controllers\ProfileController::class, 'changePassword'])->name('change-password');
    Route::post('/change-avatar', [App\Http\Controllers\ProfileController::class, 'changeAvatar'])->name('change-avatar');

    Route::resource('food', App\Http\Controllers\FoodController::class);

    Route::get('settings', function () {
        return 'Settings page';
    } )->name('settings');

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
