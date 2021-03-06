<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NewsCategory
 */
class NewsCategory extends Model
{
    protected $table = 'news_cate';

    public $timestamps = false;

    protected $fillable = [
        'title',
        'sum',
        'meta_keyword',
        'meta_description',
        'e_title',
        'e_sum',
        'e_meta_keyword',
        'e_meta_description',
        'img',
        'icon',
        'ind',
        'active'
    ];

    protected $guarded = [];

        
}