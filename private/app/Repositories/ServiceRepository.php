<?php

namespace App\Repositories;

use App\Models\Service;

class ServiceRepository extends BaseRepository
{
    public function __construct(Service $service)
    {
        $this->model = $service;
    }
    public function search($value, $title, $pageSize = 6){
        return $this->model->whereRaw('`active` = 1 AND `'.$title.'` like \'%'.$value.'%\'')
                    ->orderBy('ind', 'asc')
                    ->orderBy('id')->paginate($pageSize);        
    }
}
