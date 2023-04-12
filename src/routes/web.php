<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

use App\Classes\User;
use App\Classes\UserValidator;
use App\Classes\Comment;

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
    DB::table("articles")->take(10)->get()->dump();
    DB::table("tags")->take(10)->get()->dump();
});
