<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Classes\User;
use App\Classes\UserValidator;
use App\Classes\Comment;
use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Models\Tag;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    /** Commands used:
     * php artisan migrate
     * php artisan db:seed --class=ArticleSeeder
     * php artisan db:seed --class=TagSeeder
     * php artisan db:seed --class=ArticleTagSeeder
     * php artisan migrate:status
     */

    DB::table("articles")
        ->take(10)
        ->get()
        ->dump();

    DB::table("tags")
        ->take(10)
        ->get()
        ->dump();

    DB::table("article_tag_relations")
        ->take(10)
        ->get()
        ->dump();
});

Route::get('/articles',[ArticleController::class, "index"]);
