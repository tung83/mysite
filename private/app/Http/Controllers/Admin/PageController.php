<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Yajra\Datatables\Datatables;

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
    public function menuTable()
    {
        //return Datatables::of(Menu::query())->make(true);
         return Datatables::of(Menu::query())
            ->addColumn('action', function ($menu) {
                return '<a href="#edit-'.$menu->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })
            ->make(true);
    }
}
