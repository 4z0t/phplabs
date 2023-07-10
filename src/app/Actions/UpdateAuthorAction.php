<?php

namespace App\Actions;

use App\Models\Author;

class UpdateAuthorAction
{

    public function handle(int $id, array $table) : Author
    {
        $author = Author::findOrFail($id);
        $author->update($table);

        return $author;
    }
}
