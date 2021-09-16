<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'id',
        'category_id',
        'title',
        'title_url',
        'description',
        'content',
    ];
}

