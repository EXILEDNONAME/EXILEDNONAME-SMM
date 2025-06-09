<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;
use Redirect, Response;

trait DeleteController {

  /**
  **************************************************
  * @return DELETE
  **************************************************
  **/

  public function delete($id) {
    $this->model::destroy($id);
    $data = $this->model::where('id', $id)->delete();
    return Response::json($data);
  }

}
