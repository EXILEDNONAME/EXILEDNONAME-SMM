<?php

namespace App\Http\Requests\Backend\__System\Application\Datatable\General;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest {

  public function authorize(): bool {
    return true;
  }

  public function rules(): array {
    return [
      'name' => 'required|max:3|unique:system_application_table_generals',
    ];
  }
  
}
