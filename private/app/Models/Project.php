<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 */
class Project extends Model
{
    protected $table = 'project';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'sum',
        'content',
        'meta_keyword',
        'meta_description',
        'e_title',
        'e_sum',
        'e_content',
        'e_meta_keyword',
        'e_meta_description',
        'pId',
        'img',
        'active',
        'ind'
    ];

    protected $guarded = [];

        
}