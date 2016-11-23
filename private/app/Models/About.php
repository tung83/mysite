<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class About
 */
class About extends Model
{
    protected $table = 'about';

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
        'img',
        'active',
        'ind'
    ];

    protected $guarded = [];

        
}