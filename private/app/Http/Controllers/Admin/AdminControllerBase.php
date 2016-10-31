<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminControllerBase extends Controller
{
    public function __construct()
    {
        Session::put('admin-locale', 'vi');
        Session::save();
        App::setLocale(Session::get('admin-locale'));
    }    
}
