<?php

namespace App\Http\Traits\Backend\__System\Controllers\Datatable\Extension;

use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;
use Spatie\Activitylog\Models\Activity;

trait ActivityController {

  /**
  **************************************************
  * @return ACTIVITIES
  **************************************************
  **/

  public function activity() {
    $model = $this->model;
    $url = $this->url;
    $data = Activity::where('subject_type', $this->model)->orderby('updated_at', 'desc')->get();
    if (request()->ajax()) {
      return DataTables::of($data)
      ->editColumn('subjects', function($order) { if(!empty($order->properties['attributes']['name'])) { return $order->properties['attributes']['name']; } else { return ''; }})
      ->editColumn('causer_id', function($order) { return $order->causer->name; })
      ->editColumn('updated_at', function($order) { return \Carbon\Carbon::parse($order->updated_at)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'activity', compact('data', 'model', 'url'));
  }
  
}
