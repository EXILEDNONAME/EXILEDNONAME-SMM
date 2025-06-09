<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

trait SelectedDeletePermanentController {

  /**
  **************************************************
  * @return SELECTED-DELETE-PERMANENT
  **************************************************
  **/

  public function selected_delete_permanent(Request $request) {
    $data = $request->EXILEDNONAME;
    $this->model::whereIn('id',explode(",",$data))->forceDelete();
    return Response::json($data);
  }

}
