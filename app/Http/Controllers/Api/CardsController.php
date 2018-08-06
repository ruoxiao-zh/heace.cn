<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\CardRequest;
use App\Models\Card;
use App\Transformers\CardTransformer;
use Illuminate\Http\Request;

/**
 * 首页卡片管理
 *
 * Class CompaniesController
 * @package App\Http\Controllers\Api
 */
class CardsController extends Controller
{
    public function store(CardRequest $request, Card $card)
    {
        $card->fill($request->all());
        $card->save();

        return $this->response->item($card, new CardTransformer())
            ->setStatusCode(201);
    }

    public function update(CardRequest $request, Card $card)
    {
        // todo...
        // $this->authorize('update', $topic);

        $card->update($request->all());

        return $this->response->item($card, new CardTransformer());
    }

    public function destroy(Card $card)
    {
        // todo...
        // $this->authorize('update', $topic);

        $card->delete();

        return $this->response->noContent();
    }

    public function index(Request $request, Card $card)
    {
        $query = $card->query();
        $cards = $query->orderBy('order')->orderBy('created_at', 'desc')->get();

        return $this->response->collection($cards, new CardTransformer());
    }

    public function show(Card $card)
    {
        return $this->response->item($card, new CardTransformer());
    }
}
