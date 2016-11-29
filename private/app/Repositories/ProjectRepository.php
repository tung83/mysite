<?php

namespace App\Repositories;

use App\Models\Project;

class ProjectRepository extends BaseRepository
{
    public function __construct(Project $project)
    {
        $this->model = $project;
    }
    
    public function search($value, $title, $pageSize = 6){
        return $this->model->whereRaw('`active` = 1 AND `'.$title.'` like \'%'.$value.'%\'')
                    ->orderBy('ind', 'asc')
                    ->orderBy('id')->paginate($pageSize);        
    }
}
