<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;
use Redirect, Response;

trait RestoreController {

  /**
  **************************************************
  * @return RESTORE
  **************************************************
  **/

  public function restore($id) {
    $data = $this->model::withTrashed()->findOrFail($id);
    if ($data->trashed()) {
      $data->restore();
      $data = $this->model::where('id', $id)->update(['deleted_at' => NULL]);
      return Response::json($data);
    } else { return Response::json($data);}
  }

}
