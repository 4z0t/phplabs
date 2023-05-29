<?php

namespace App\Actions;

use App\Http\Requests\CreateModRequest;
use App\Models\Mod;

class CreateModAction
{

    public function handle(CreateModRequest $request) : Mod
    {
        return Mod::create($request->validated());
    }
}
