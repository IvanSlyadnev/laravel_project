<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('cc', 'HomeController@test')->name('test');

Route::get('/shorter', 'ShortLinkController@index')->name('generate.shorten.link');
Route::post('cc', 'ShortLinkController@store')->name('generate.shorten.link.post');
Route::get('{code}', 'ShortLinkController@shortenLink')->name('shorten.link');
Route::get('delete/{id}', 'ShortLinkController@delete')->name('link.delete');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
