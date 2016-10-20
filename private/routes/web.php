<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

// Home
Route::get('/', 'Front\HomeController')->name('home');

// Language
Route::get('language/{lang}', 'Front\LanguageController')
    ->where('lang', implode('|', config('app.languages')));
