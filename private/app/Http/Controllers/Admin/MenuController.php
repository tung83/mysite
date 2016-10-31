<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Repositories\MenuRepository;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class MenuController extends AdminControllerBase
{
    use AdminPageCommon;
    protected $menuRepository;
    /**
     * Create a new PageController instance.
     *
     * @return void
     */
    public function __construct(MenuRepository $menuRepository)
    {        
        parent::__construct();
        $this->menuRepository = $menuRepository;
        //$this->middleware('admin');
    }

    /**
    * Show the admin panel.
    *
    * @return \Illuminate\Http\Response
    */
    public function __invoke()
    {
        return view('admin.menu.list');        
    }
    public function menuTable()
    {
         return Datatables::of(Menu::query())
            ->addColumn('action', function ($menu) {
                return $this->addAction($menu, 'page');
            })
            ->editColumn('id', 'ID: {{$id}}')
            ->editColumn('title', $this->getDualLangCellContent('title'))
            ->make(true);
    }
    
    public function create()
    {
        return view('admin.menu.create');
    }
    
    public function store(Request $request)
    {
        $this->menuRepository->store($request->all());

        return redirect()->route('admin_page', ['ok'=>trans('admin/menu.stored')]);
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = $this->menuRepository->getById($id);

        return view('admin.menu.edit', compact('menu'));
    }
    
    public function update(Request $request, $id)
    {
        $this->menuRepository->update($request->all(), $id);

        return redirect()->route('admin_page', ['ok'=>trans('admin/menu.updated')]);
    }
    
    public function destroy($id)
    {
        $post = $this->menuRepository->getById($id);

        $this->authorize('change', $post);

        $this->menuRepository->destroy($post);

        return redirect('menu')->with('ok', trans('admin/menu.destroyed'));
    }
}
