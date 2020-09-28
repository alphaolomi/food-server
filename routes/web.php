<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');


Route::get('/', [App\Http\Controllers\PageController::class,'index'])->name('index');
Route::get('/contact', [App\Http\Controllers\PageController::class,'index'])->name('contact');

// Route::group(['middleware' => ['']], function () {
    Route::resource('foods', App\Http\Controllers\FoodController::class);
// });
