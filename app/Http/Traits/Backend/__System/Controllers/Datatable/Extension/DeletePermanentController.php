<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;
use Redirect, Response;

trait DeletePermanentController {

  /**
  **************************************************
  * @return DELETE-PERMANENT
  **************************************************
  **/

  public function delete_permanent($id) {
    $data = $this->model::withTrashed()->findOrFail($id);
    if(!$data->trashed()) { return Response::json($data); }
    else {
      $data->forceDelete();
      return Response::json($data);
    }
  }

}
