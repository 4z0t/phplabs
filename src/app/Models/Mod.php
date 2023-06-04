<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mod
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $author_id
 * @property integer $major_version
 * @property integer $minor_version
 * @property integer $patch_version
 * @property string $link
 */
class Mod extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'author_id',
        'major_version',
        'minor_version',
        'patch_version',
        'link',
        ];
}
