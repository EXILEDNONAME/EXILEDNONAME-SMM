<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Default;

use Illuminate\Http\Request;
use Redirect, Response;

trait EditController {

  /**
  **************************************************
  * @return EDIT
  **************************************************
  **/

  public function edit($id) {
    $data = $this->model::findOrFail($id);
    $model = $this->model;
    $path = $this->path;
    $url = $this->url;
    return view($this->path . 'edit', compact('data', 'model', 'path', 'url'));
  }

}
