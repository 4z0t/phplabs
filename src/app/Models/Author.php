<?php

namespace App\Models;

use App\Models\Mod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Author
 *
 * @property integer $id
 * @property string $name
 */
class Author extends Model
{
    use HasFactory;

    public function mods() : HasMany
    {
       return $this->hasMany(Mod::class);
    }
}
