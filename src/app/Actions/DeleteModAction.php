<?php

namespace App\Actions;

use App\Http\Resources\ModResource;
use App\Models\Mod;
use Illuminate\Http\Response;

class DeleteModAction
{

    public function handle(int $id) : Response
    {
        $mod = new ModResource(Mod::findOrFail($id));
        $mod->delete();

        return response(null, Response::HTTP_OK);
    }
}
