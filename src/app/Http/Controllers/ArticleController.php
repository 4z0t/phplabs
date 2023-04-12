<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function index(): View
    {
        return view('articles', [
            'articles' => DB::table("articles")->paginate(10)
        ]);
    }
}
