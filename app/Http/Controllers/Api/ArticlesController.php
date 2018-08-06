<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ArticleRequest;
use App\Models\Article;
use App\Transformers\ArticleTransformer;
use Illuminate\Http\Request;

/**
 * 文章管理
 *
 * Class ArticlesController
 * @package App\Http\Controllers\Api
 */
class ArticlesController extends Controller
{
    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all());
        $article->save();

        return $this->response->item($article, new ArticleTransformer())
            ->setStatusCode(201);
    }

    public function update(ArticleRequest $request, Article $article)
    {
        // todo...
        // $this->authorize('update', $topic);
        $article->update($request->all());

        return $this->response->item($article, new ArticleTransformer());
    }

    public function destroy(Article $article)
    {
        // todo...
        // $this->authorize('update', $topic);

        $article->delete();
        return $this->response->noContent();
    }

    public function index(Request $request, Article $article)
    {
        if ($request->paginate == 'true') {
            $query = $article->query();
            $articles = $query->orderBy('is_top', 'desc')->orderBy('created_at', 'desc')->paginate(15);

            return $this->response->paginator($articles, new ArticleTransformer());
        } else {
            $query = $article->query();
            $articles = $query->orderBy('is_top', 'desc')->orderBy('created_at', 'desc')->get();

            return $this->response->collection($articles, new ArticleTransformer());
        }
    }

    public function show(Article $article)
    {
        return $this->response->item($article, new ArticleTransformer());
    }

    public function categoryArticles(Request $request, Article $article)
    {
        $query = $article->query();
        $articles = $query->where('cate', $request->cate)->orderBy('is_top', 'desc')->orderBy('created_at', 'desc')->paginate(15);

        return $this->response->paginator($articles, new ArticleTransformer());
    }

    public function changeTop(Article $article)
    {
        if ($article->is_top) {
            $article->is_top = 0;
        } else {
            $article->is_top = 1;
        }
        $article->save();

        return $this->response->item($article, new ArticleTransformer());
    }
}
