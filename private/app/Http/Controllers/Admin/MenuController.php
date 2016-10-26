<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Repositories\MenuRepository;
use Yajra\Datatables\Datatables;

class MenuController extends Controller
{
    protected $menuRepository;
    /**
     * Create a new PageController instance.
     *
     * @return void
     */
    public function __construct(MenuRepository $menuRepository)
    {
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
        //return Datatables::of(Menu::query())->make(true);
         return Datatables::of(Menu::query())
            ->addColumn('action', function ($menu) {
                return '<a href="#edit-'.$menu->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i></a>'
                        .'<a href="#delete-'.$menu->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-trash"></i> </a>';
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.menu.create');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \App\Http\Requests\PostRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $this->menuRepository->store($request->all(), $request->user()->id);

        return redirect('menu')->with('ok', trans('admin/menu.stored'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = $this->menuRepository->getByIdWithTags($id);

        $this->authorize('change', $post);

        return view('admin.menu.edit', $this->menuRepository->getPostWithTags($post));
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \App\Http\Requests\PostUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $post = $this->menuRepository->getById($id);

        $this->authorize('change', $post);

        $this->menuRepository->update($request->all(), $post);

        return redirect('menu')->with('ok', trans('admin/menu.updated'));
    }

    /**
     * Remove the specified post from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = $this->menuRepository->getById($id);

        $this->authorize('change', $post);

        $this->menuRepository->destroy($post);

        return redirect('menu')->with('ok', trans('admin/menu.destroyed'));
    }
}
