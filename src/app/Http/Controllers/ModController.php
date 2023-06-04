<?php

namespace App\Http\Controllers;

use App\Actions\CreateModAction;
use App\Actions\DeleteModAction;
use App\Actions\UpdateModAction;
use App\Http\Requests\CreateModRequest;
use App\Http\Requests\UpdateModRequest;
use App\Http\Resources\ModResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Mod;

class ModController extends Controller
{
    /**
     * All mods
     */
    public function getMods() : ResourceCollection
    {
        return ModResource::collection(Mod::all());
    }

    /**
     * Mod by id
     */
    public function getMod(int $id) : ModResource
    {
        return new ModResource(Mod::findOrFail($id));
    }

    /**
     * Creates mod from request
     */
    public function createMod(CreateModRequest $request, CreateModAction $action) : ModResource
    {
        return new ModResource($action->handle($request));
    }

    /**
     * Deletes mod by id
     */
    public function deleteMod(int $id, DeleteModAction $action) : Response
    {
        return $action->handle($id);
    }

    public function patchMod(int $id, UpdateModRequest $request, UpdateModAction $action) : ModResource
    {
        return new ModResource($action->handle($id, $request->validated()));
    }

}
