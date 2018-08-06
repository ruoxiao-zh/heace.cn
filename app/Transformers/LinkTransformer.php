<?php
/**
 * Created by PhpStorm.
 * User: Wang
 * Date: 2018/8/1
 * Time: 12:04
 */

namespace App\Transformers;

use App\Models\Link;
use League\Fractal\TransformerAbstract;

class LinkTransformer extends TransformerAbstract
{
    public function transform(Link $links)
    {
        return [
            'id'         => $links->id,
            'name'       => $links->name,
            'url'        => $links->url,
            'order'      => (int)$links->order,
            'created_at' => $links->created_at->toDateTimeString(),
            'updated_at' => $links->updated_at->toDateTimeString(),
        ];
    }
}
