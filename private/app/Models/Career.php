<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Recruit
 */
class Career extends Model
{
    protected $table = 'career';

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
        'dates',
        'ind'
    ];

    protected $guarded = [];

        
}