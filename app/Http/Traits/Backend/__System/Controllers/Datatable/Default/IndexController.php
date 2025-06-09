<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Default;
use DataTables;

trait IndexController {

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $model = $this->model;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

}
