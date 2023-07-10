<?php

namespace App\Actions;

use App\Models\Mod;

class UpdateModAction
{
    public function handle(int $id, array $table) : Mod
    {
        $mod = Mod::findOrFail($id);
        $mod->update($table);

        return $mod;
    }
}
