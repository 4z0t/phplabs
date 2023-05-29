<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Author;

class ModResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "description" => $this->description,
            "author" => AuthorResource::collection(Author::find($this->author_id)),
            "major_version" => $this->major_version,
            "minor_version" => $this->minor_version,
            "patch_version" => $this->patch_version,
            "link" => $this->link,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
        ];
    }
}
