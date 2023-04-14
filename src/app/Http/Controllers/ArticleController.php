<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{

    public function getByCode(string $code): View
    {

        $articles = Article::query()
            ->where("code", "=", $code)
            ->get();

        if ($articles->isEmpty())
            return abort(404);

        $article = $articles->get(0);

        return view('articleById', [
            "tags" => $article
                ->tags()
                ->orderBy("name")
                ->get(),
            'article' => $article
        ]);
    }

    public function index(Request $request): View
    {
        $articles = Article::query();
        if ($request->has("article-name")) {
            $articles = $articles->where("name", "like", "%{$request->get("article-name")}%");
        }

        return view('articles', [
            'articles' => $articles->paginate(10)
        ]);
    }
}