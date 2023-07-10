<?php

namespace App\Actions;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Response;

class DeleteAuthorAction
{
    public function handle(int $id) : Response
    {
        $author = new AuthorResource(Author::findOrFail($id));
        $author->delete();

        return response(null, Response::HTTP_OK);
    }
}
