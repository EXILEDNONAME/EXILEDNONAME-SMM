<?php

namespace App\Http\Controllers\Backend\__System\Administrative;

use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;
use Redirect, Response;
use Illuminate\Routing\Controllers\HasMiddleware;

class SessionController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'role:master-administrator']; }

  function __construct() {
    $this->model = 'App\Models\Backend\__System\Administrative\Session';
    $this->path = 'pages.backend.__system.administrative.session.';
    $this->url = '/dashboard/administrative/sessions';
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = $this->model::get(); }
  }

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
      ->editColumn('avatar', function ($order) {
        if (!empty($order->user_id)) {
          $data = \App\Models\User::where('id', $order->user_id)->first();
          if (!empty($data)) { return '<div class="symbol symbol-lg-35 symbol-30 symbol-circle symbol-light-success" bis_skin_checked="1"><img src="/public/assets/backend/media/users/blank.png"></div>'; }
          else { return $data->avatar; }
        }
      })
      ->editColumn('user_id', function ($order) {
        if (!empty($order->user_id)) {
          $data = \App\Models\User::where('id', $order->user_id)->first();
          return $data->name . '<br>' . $data->email . '<br>' . $data->phone;
        }
      })
      ->editColumn('last_activity', function ($order) {
        $data = $order->last_activity;
        $datetime = date("d F Y, H:i:s", $data);
        return $datetime;
      })
      ->rawColumns(['user_id', 'avatar'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  /**
  **************************************************
  * @return RESET
  **************************************************
  **/

  public function reset() {
    $data = $this->model::truncate();
    return Response::json($data);
  }

}
