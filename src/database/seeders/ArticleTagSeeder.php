<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use App\Models\Article;
use App\Models\Tag;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $articles = Article::all();
        $tags = Tag::all();

        $articles->each(function (Article $article) use ($tags) {
            $article->tags()->attach(
                $tags
                    ->random(10)
                    ->pluck('id')
                    ->toArray()
            );
        });
    }
}
