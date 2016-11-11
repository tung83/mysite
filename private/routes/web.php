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
    Route::get('services', 'ServiceController');
    Route::get('services/{serviceCategory}', 'ServiceController');
    Route::get('dich-vu', 'ServiceController');
    Route::get('dich-vu/{serviceCategory}', 'ServiceController');

    // Project
    Route::get('projects', 'ProjectController@index');
    Route::get('du-an', 'ProjectController@index');
    Route::get('projects/{projectItem}', 'ProjectController@getItem');
    Route::get('du-an/{projectItem}', 'ProjectController@getItem');
    Route::get('/ajax/projects','ProjectAjaxController@partialProjectData');

    // News
    Route::get('news', 'NewsController@index');
    Route::get('tin-tuc', 'NewsController@index');
    Route::get('news/{projectItem}', 'NewsController@getItem');
    Route::get('tin-tuc/{projectItem}', 'NewsController@getItem');
    Route::get('/ajax/news','NewsAjaxController@partialNewsData');

    //Contact
    Route::get('contact', 'ContactController@index');
    Route::get('lien-he', 'ContactController@index');
    Route::post('contact', 'ContactController@store');
    Route::post('lien-he', 'ContactController@store');


    Route::get('/ajax/homeProject','ProjectAjaxController@partialHomeData');
    Route::get('/ajax/homeNews','NewsAjaxController@partialHomeData');
    

});

// Authentication 
Auth::routes();
Route::group(['namespace' => 'Admin', 'middleware' => 'auth', 'prefix' => 'admin@@'], function() {

    Route::get('/', 'AdminController')->name('Admin');  
    // page
    Route::get('/page', 'MenuController')->name('admin.page');
    Route::get('admin.pageTable', 'MenuController@menuTable')->name('admin.pageTable');
    Route::resource('page', 'MenuController', ['except' => ['show','index'], 'as' => 'admin']);
    
    // Medias
    Route::get('medias', 'FilemanagerController')->name('medias');
    //Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('adminLogin');  
    //Route::get('/', 'AdminController'->name('admin'))
    // the rest of your dashboard routes.

});