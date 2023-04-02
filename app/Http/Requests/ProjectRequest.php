<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["required", "string", "max:255", "unique:projects,name"],
            "description" => ["required", "string", "max:255"],
            "timeline" => ["required", "date"],
//            "timeline" => ["required", "date", "after:today"],
            "budget" => ["required", "integer"],
            "resource_allocation" => ["required", "integer"],
            "color" => ["nullable", "string", "max:255"]
        ];
    }
}
