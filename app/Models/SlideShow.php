<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SlideShow extends Model
{
    protected $table = 'slideshows';

    protected $fillable = ['image', 'info', 'article_id', 'order'];

    public function article()
    {
        return $this->belongsTo(Article::class, 'article_id', 'id');
    }
}
