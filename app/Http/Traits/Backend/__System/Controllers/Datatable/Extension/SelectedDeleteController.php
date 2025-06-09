<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use Illuminate\Http\Request;
use Redirect, Response;

trait SelectedDeleteController {

  /**
  **************************************************
  * @return SELECTED-DELETE
  **************************************************
  **/

  public function selected_delete(Request $request) {
    $data = $request->EXILEDNONAME;
    $data2 = $this->model::whereIn('id',explode(",",$data))->get();
    foreach ($data2 as $data3) {
      $this->model::destroy($data3->id);
    }
    return Response::json($data);
  }

}
