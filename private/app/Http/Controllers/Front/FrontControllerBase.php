<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Session;

class FrontControllerBase extends Controller
{
    public function __construct()
    {
        $this->middleware('front');
    }    
}
