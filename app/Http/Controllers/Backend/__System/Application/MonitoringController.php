<?php

namespace App\Http\Controllers\Backend\__System\Application;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use DataTables;
use Illuminate\Routing\Controllers\HasMiddleware;

use App\Http\Requests\Backend\__System\Application\Monitoring\StoreRequest;
use App\Http\Requests\Backend\__System\Application\Monitoring\UpdateRequest;

class MonitoringController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'role:master-administrator']; }

  function __construct() {
    $this->model = 'App\Models\Backend\__System\Application\Monitoring';
    $this->path = 'pages.backend.__system.application.monitoring.';
    $this->url = '/dashboard/applications/monitorings';
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = $this->model::get(); }
  }

  use DefaultController;
  use ExtensionController;

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
      ->editColumn('status_device', function($order) {
        if(!$socket = @fsockopen($order->ip_address, $order->port, $errNo, $errStr, 0.01)) { return '<span class="label label-danger label-inline"> OFFLINE </span>'; }
        else { return '<span class="label label-success label-inline"> ONLINE </span>'; fclose($socket); }
      })
      ->rawColumns(['description', 'status_device'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(StoreRequest $request) {
    $store = $request->all();
    $this->model::create($store);
    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(UpdateRequest $request, $id) {
    $data = $this->model::findOrFail($id);
    $update = $request->all();
    $data->update($update);
    return redirect($this->url)->with('success', __('default.notification.success.item-updated'));
  }

}
