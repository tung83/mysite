<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\PannelPage;

class PageController extends Controller
{
    /**
     * Create a new PageController instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('admin');
    }

    /**
    * Show the admin panel.
    *
    * @return \Illuminate\Http\Response
    */
    public function __invoke()
    {
        return view('admin.page.pages');        
    }
}
