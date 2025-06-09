<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

trait SelectedRestoreController {

  /**
  **************************************************
  * @return SELECTED-RESTORE
  **************************************************
  **/

  public function selected_restore(Request $request) {
    $data = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$data))->restore();
    return Response::json($data);
  }

}
