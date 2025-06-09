<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;

trait TrashController {

  /**
  **************************************************
  * @return TRASH
  **************************************************
  **/

  public function trash() {
    $data = $this->model::onlyTrashed()->get();
    $url = $this->url;
    if(request()->ajax()) {
      return DataTables::of($data)
      ->editColumn('deleted_at', function($order) { return \Carbon\Carbon::parse($order->deleted_at)->format('d F Y, H:i'); })
      ->rawColumns(['description'])
      ->addIndexColumn()
      ->make(true);
    }
    return view($this->path . 'trash', compact('data', 'url'));
  }

}
