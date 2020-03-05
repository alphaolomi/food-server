<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});

Route::get('/contact', function () {
    return view('pages.contact');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('profile/setting', 'ProfileController@edit')->name('profile.setting');


Route::resource('foods', 'FoodController');
