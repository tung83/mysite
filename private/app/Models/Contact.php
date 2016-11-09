<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Contact extends Model
{
    use DatePresenter;

    protected $table = 'contact';
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['fullName', 'company','address','phone','fax','email','department', 'content'];
}
