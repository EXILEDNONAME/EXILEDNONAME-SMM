<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

trait SelectedActiveController {

  /**
  **************************************************
  * @return SELECTED_ACTIVE
  **************************************************
  **/

  public function selected_active(Request $request) {
    $data = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$data))->update(['active' => 1]);
    return Response::json($data);
  }

}
