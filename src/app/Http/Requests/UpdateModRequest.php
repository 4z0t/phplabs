<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UpdateModRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "max:255|unique:mods,name",
            "description" => "",
            "author_id" => "exists:author,id",
            "major_version" => "integer", //something for integer required...
            "minor_version" => "integer", //something for integer required...
            "patch_version" => "integer", //something for integer required...
            "link" => "",
        ];
    }
}

