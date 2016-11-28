<?php

namespace App\Repositories;

use App\Models\AboutCategory;

class AboutCategoryRepository extends BaseRepository
{
    public function __construct(AboutCategory $aboutCategory)
    {
        $this->model = $aboutCategory;
    }
}
