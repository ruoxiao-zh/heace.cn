<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\LinkRequest;
use App\Models\Link;
use App\Transformers\LinkTransformer;
use Illuminate\Http\Request;

class LinksController extends Controller
{
    public function store(LinkRequest $request, Link $link)
    {
        $link->fill($request->all());
        $link->save();

        return $this->response->item($link, new LinkTransformer())
            ->setStatusCode(201);
    }

    public function update(LinkRequest $request, Link $link)
    {
        // todo...
        // $this->authorize('update', $topic);
        $link->update($request->all());

        return $this->response->item($link, new LinkTransformer());
    }

    public function destroy(Link $link)
    {
        // todo...
        // $this->authorize('update', $topic);

        $link->delete();

        return $this->response->noContent();
    }

    public function index(Request $request, Link $link)
    {
        $query = $link->query();
        if ($request->paginate == 'true') {
            $links = $query->orderBy('order')->orderBy('created_at', 'desc')->paginate(15);

            return $this->response->paginator($links, new LinkTransformer());
        } else {
            $links = $query->orderBy('order')->orderBy('created_at', 'desc')->get();

            return $this->response->collection($links, new LinkTransformer());
        }
    }

    public function show(Link $link)
    {
        return $this->response->item($link, new LinkTransformer());
    }
}
