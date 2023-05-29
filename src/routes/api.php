<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ModController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/mods/{id}', [ModController::class, 'getMod']);
Route::post('v1/mods', [ModController::class, 'getMods']);
Route::delete('v1/mods/{id}', [ModController::class, 'deleteMod']);
Route::put('v1/mods/{id}', [ModController::class, 'patchMod']);
Route::patch('v1/mods/{id}', [ModController::class, 'patchMod']);

Route::get('v1/authors/{id}', [AuthorController::class, 'getAuthor']);
Route::post('v1/authors', [AuthorController::class, 'getAuthors']);
Route::delete('v1/authors/{id}', [AuthorController::class, 'deleteAuthor']);
Route::put('v1/authors/{id}', [AuthorController::class, 'patchAuthor']);
Route::patch('v1/authors/{id}', [AuthorController::class, 'patchAuthor']);
