<?php

namespace App\Http\Controllers;

use App\Actions\CreateAuthorAction;
use App\Actions\DeleteAuthorAction;
use App\Actions\UpdateAuthorAction;
use App\Http\Requests\CreateAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Resources\AuthorResource;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * All authors
     */
    public function getAuthors() : ResourceCollection
    {
        return AuthorResource::collection(Author::all());
    }

    /**
     * Author by id
     */
    public function getAuthor(int $id) : AuthorResource
    {
        return new AuthorResource(Author::findOrFail($id));
    }

    /**
     * Creates author from request
     */
    public function createAuthor(CreateAuthorRequest $request, CreateAuthorAction $action) : AuthorResource
    {
        return new AuthorResource($action->handle($request));
    }

    /**
     * Deletes author by id
     */
    public function deleteAuthor(int $id, DeleteAuthorAction $action) : Response
    {
        return $action->handle($id);
    }

    public function patchAuthor(int $id, UpdateAuthorRequest $request, UpdateAuthorAction $action) : AuthorResource
    {
        return new AuthorResource($action->handle($id, $request->validated()));
    }
}
