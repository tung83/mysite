<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class DatatablesController extends Controller
{
    public function getIndex()
    {
        return view('admin.page.datatable');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Menu::query())->make(true);
    }
}
