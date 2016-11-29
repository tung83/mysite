<?php

namespace App\Repositories;

abstract class BaseRepository
{
    /**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Destroy a model.
     *
     * @param  int $id
     * @return void
     */
    public function destroy($id)
    {
        $this->getById($id)->delete();
    }

    /**
     * Get Model by id.
     *
     * @param  int  $id
     * @return \App\Models\Model
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }
    
    public function getFirst()
    {
        return $this->model->whereActive(true)->first();
    }

    /**
     * Get Model by id.
     *
     * @param  int  $id
     * @return \App\Models\Model
     */
    public function getByPid($pId)
    {
        return $this->model->where([['active', '=', 1],['pId', '=', $pId]])
                    ->orderBy('ind', 'asc')
                    ->orderBy('id')->get();
    }
    
    public function paginateByPid($pId, $pageSize)
    {
        return $this->model->where([['active', '=', 1],['pId', '=', $pId]])
                    ->orderBy('ind', 'asc')
                    ->orderBy('id')->paginate($pageSize);
    }
    
    public function paginateHomeByPid($pId, $pageSize)
    {
        return $this->model->where([['active', '=', 1],['pId', '=', $pId], ['home', '=', 1]])
                    ->orderBy('ind', 'asc')
                    ->orderBy('id')->paginate($pageSize);
    }
    
    public function paginate($pageSize)
    {
        return $this->model
                    ->orderBy('ind', 'asc')
                    ->orderBy('id')->paginate($pageSize);
    }
    
    public function getAll()
    {
        return $this->model->all();
    }
    
    public function getActive($n=null)
    {
        if($n){
            return $this->model
                    ->whereActive(true)
                    ->orderBy('ind', 'asc')
                    ->orderBy('id')
                    ->paginate($n);
        }
        else{ 
            return $this->model
                    ->whereActive(true)
                    ->orderBy('ind', 'asc')
                    ->orderBy('id')
                    ->get();

        }
    }
    
    public function getActiveHome($n=null)
    {
        if($n){
            return $this->model
                    ->where([['active', '=', 1], ['home', '=', 1]])
                    ->orderBy('ind', 'asc')
                    ->orderBy('id')
                    ->paginate($n);
        }
        else{ 
            return $this->model
                    ->where([['active', '=', 1], ['home', '=', 1]])
                    ->orderBy('ind', 'asc')
                    ->orderBy('id')
                    ->get();

        }
    }
}
