<?php

namespace App\Repositories;

use App\Models\Career;

class CareerRepository extends BaseRepository
{
    public function __construct(Career $career)
    {
        $this->model = $career;
    }
}
