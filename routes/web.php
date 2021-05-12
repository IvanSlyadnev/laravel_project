<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::resource('urls', 'UrlController');
});

Route::get('/home', 'HomeController@index')->name('home');
