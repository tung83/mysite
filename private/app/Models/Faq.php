<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Faq
 */
class Faq extends Model
{
    protected $table = 'faq';

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
        'maps',
        'city',
        'district',
        'img',
        'home',
        'best',
        'active',
        'dates',
        'ind'
    ];

    protected $guarded = [];

        
}