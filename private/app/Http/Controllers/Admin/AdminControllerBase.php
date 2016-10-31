<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Session;

class AdminControllerBase extends Controller
{
    public function __construct()
    {
        session()->put('admin-locale', 'en');
        session()->save();
        app()->setLocale(Session::get('admin-locale'));
    }    
}
