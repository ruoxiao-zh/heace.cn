<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    protected $fillable = [
        'cate',
        'title',
        'image',
        'content',
        'is_top',
        'is_index',
        'source',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;
}
