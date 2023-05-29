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
     * All mods
     */
    public function getMods() : ResourceCollection
    {
        return AuthorResource::collection(Author::all());
    }

    /**
     * Creates mod from request
     */
    public function createMod(CreateAuthorRequest $request, CreateAuthorAction $action) : AuthorResource
    {
        return new AuthorResource($action->handle($request));
    }

    /**
     * Deletes mod by id
     */
    public function deleteMod(int $id, DeleteAuthorAction $action) : Response
    {
        return $action->handle($id);
    }

    public function patchMod(int $id, UpdateAuthorRequest $request, UpdateAuthorAction $action) : AuthorResource
    {
        return new AuthorResource($action->handle($id, $request->validated()));
    }
}
