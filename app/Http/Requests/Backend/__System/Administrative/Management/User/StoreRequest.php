<?php

namespace App\Http\Requests\Backend\__System\Administrative\Management\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Validator;

Validator::extend('validateWithoutSpaces', function ($attribute, $value, $parameters, $validator) {
  return !Str::contains($value, ' '); // Checks for spaces
});

class StoreRequest extends FormRequest
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
  * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
  */
  public function rules(): array
  {
    return [
      'phone' => 'required|unique:users',
      'username' => 'required|validateWithoutSpaces|unique:users',
      'email' => 'required|unique:users',
    ];
  }

  public function messages(): array
  {
    return [
      'validate_without_spaces' => 'Spaces are not allowed.',
    ];
  }
}
