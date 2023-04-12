<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * The articles with tags
     */
    public function articles(): BelongsToMany
    {
        return  $this->belongsToMany(Article::class, "article_tag_relations");
    }
}
