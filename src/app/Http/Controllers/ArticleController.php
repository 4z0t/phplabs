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

        $articles = Article::query()->where("code", "=", $code)->get();

        if ($articles->isEmpty())
            return abort(404);

        $article = $articles->get(0);
        
        return view('articleById', [
            "tags" => $article->tags()->get(),
            'article' => $article
        ]);
    }

    public function index(): View
    {
        return view('articles', [
            'articles' => DB::table("articles")->paginate(10)
        ]);
    }
}