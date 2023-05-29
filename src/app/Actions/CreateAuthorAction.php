<?php

namespace App\Actions;

use App\Http\Requests\CreateAuthorRequest;
use App\Models\Author;

class CreateAuthorAction
{
    public function handle(CreateAuthorRequest $request) : Author
    {
        return Author::create($request->validated());
    }
}
