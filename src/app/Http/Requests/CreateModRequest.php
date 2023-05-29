<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateModRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|max:255|unique:mods,name",
            "description" => "required",
            "author_id" => "required|exists:author,id",
            "major_version" => "required", //something for integer required...
            "minor_version" => "required", //something for integer required...
            "patch_version" => "required", //something for integer required...
            "link" => "required",
        ];
    }
}
