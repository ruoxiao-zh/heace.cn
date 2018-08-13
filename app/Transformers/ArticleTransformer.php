<?php

namespace App\Transformers;

use App\Models\Article;
use League\Fractal\TransformerAbstract;

class ArticleTransformer extends TransformerAbstract
{
    public function transform(Article $article)
    {
        return [
            'id'         => $article->id,
            'cate'       => $article->cate,
            'title'      => $article->title,
            'image'      => $article->image,
            'content'    => $article->content,
            'source'     => $article->source,
            'is_top'     => (boolean)$article->is_top,
            'is_index'   => (boolean)$article->is_index,
            'created_at' => $article->created_at,
            'updated_at' => $article->updated_at,
        ];
    }
}
