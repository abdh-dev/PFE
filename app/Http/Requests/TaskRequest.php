<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, Rule|array|string>
   */

  public function rules(): array
  {
    return [
      "title" => ["required", "string", "max:255"],
      "description" => ["sometimes", "string"],
      "status" => ["required", "integer", "min:0", "max:3"],
      "priority" => ["required", "integer", "min:0", "max:3"],
      "estimated_time" => ["sometimes", "numeric", "min:0"],
      "bonus" => ["sometimes", "integer", "min:0"],
      "penalty" => ["sometimes", "integer", "min:0"],
      "start_date" => ["required", "date"],
      "due_date" => ["required", "date"],
      "completion_date" => ["nullable", "date"],
      "custom_fields" => ["sometimes", "array"],
      "subtask_of" => ["nullable", "integer", "min:1"],
//    TODO add validation for custom fields
    ];
  }
}
