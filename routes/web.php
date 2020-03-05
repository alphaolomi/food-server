<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', 'PageController@index')->name('index');
Route::get('/contact', 'PageController@index')->name('contact');


Route::get('profile/setting', 'ProfileController@edit')->name('profile.setting');
Route::resource('foods', 'FoodController');
