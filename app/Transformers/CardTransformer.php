<?php

namespace App\Transformers;

use App\Models\Card;
use League\Fractal\TransformerAbstract;

class CardTransformer extends TransformerAbstract
{
    public function transform(Card $card)
    {
        return [
            'id'         => $card->id,
            'title'      => $card->title,
            'images'     => json_decode($card->images, true),
            'content'    => $card->content,
            'order'      => (int)$card->order,
            'created_at' => $card->created_at->toDateTimeString(),
            'updated_at' => $card->updated_at->toDateTimeString(),
        ];
    }
}
