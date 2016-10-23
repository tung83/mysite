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


Route::group(['namespace' => 'Front'], function() {

    // Home
    Route::get('/', 'HomeController')->name('home');

    // Language
    Route::get('language/{lang}', 'LanguageController')
        ->where('lang', implode('|', config('app.languages')));

    // Service
    Route::get('service', 'ServiceController');
    Route::get('service/{serviceCategory}', 'ServiceController');
    Route::get('dich-vu', 'ServiceController');
    Route::get('dich-vu/{serviceCategory}', 'ServiceController');

    // Project
    Route::get('project', 'ProjectController@index');
    Route::get('du-an', 'ProjectController@index');
    Route::get('project/{projectItem}', 'ProjectController@getItem');
    Route::get('du-an/{projectItem}', 'ProjectController@getItem');
    Route::get('/ajax/project','ProjectAjaxController@partialProjectData');

    // News
    Route::get('news', 'NewsController@index');
    Route::get('tin-tuc', 'NewsController@index');
    Route::get('news/{projectItem}', 'NewsController@getItem');
    Route::get('tin-tuc/{projectItem}', 'NewsController@getItem');
    Route::get('/ajax/news','NewsAjaxController@partialNewsData');

    //Contact
    Route::get('contact', 'ContactFormController@index');
    Route::get('lien-he', 'ContactFormController@index');


    Route::get('/ajax/homeProject','ProjectAjaxController@partialHomeData');
    Route::get('/ajax/homeNews','NewsAjaxController@partialHomeData');
    

});

// Authentication 
Auth::routes();
Route::group(['namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => 'admin@@'], function() {

    Route::get('/', 'AdminController')->name('Admin');  
    // Medias
    Route::get('medias', 'FilemanagerController')->name('medias');
    //Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('adminLogin');  
    //Route::get('/', 'AdminController'->name('admin'))
    // the rest of your dashboard routes.

});
