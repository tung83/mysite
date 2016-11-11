<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository extends BaseRepository
{
    /**
     * Create a new MenuRepository instance.
     *
     * @param  \App\Models\Menu $menu
     * @return void
     */
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }

    /**
     * Create a post.
     *
     * @param  array  $inputs
     * @param  int    $user_id
     * @return void
     */
    public function store($inputs)
    {        
        $this->model->title = $inputs['title'];
        $this->model->meta_keyword = $inputs['meta_keyword'];
        $this->model->meta_description = $inputs['meta_description'];
        $this->model->e_title = $inputs['e_title'];
        $this->model->e_meta_keyword = $inputs['e_meta_keyword'];
        $this->model->e_meta_description = $inputs['e_meta_description'];

        $this->model->save();
    }
    
    public function update($inputs, $id)
    {        
        $this->model = $this->getById($id);
        $this->store($inputs);
    }
    
    public function getByEView($name)
    {
        return $this->model->where('e_view', $name)->first();;
    }
}
