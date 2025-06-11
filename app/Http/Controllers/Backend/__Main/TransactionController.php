<?php

namespace App\Http\Controllers\Backend\__Main;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use DataTables;
use Illuminate\Routing\Controllers\HasMiddleware;

class TransactionController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth']; }

  function __construct() {
    $this->model = 'App\Models\Backend\__Main\Transaction';
    $this->path = 'pages.backend.__main.transaction.';
    $this->url = '/dashboard/transactions';
    $this->data = $this->model::where('id_user', Auth::user()->id)->get();
  }

  use DefaultController;
  use ExtensionController;

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $now = \Carbon\Carbon::now()->timestamp;
    $item = $this->model::get();
    foreach($item as $item) {
      if ($now - strtotime($item->created_at) > 300) { $this->model::where('id', $item->id)->update(['status' => 3]); }
      else if ($now - strtotime($item->created_at) > 60) { $this->model::where('id', $item->id)->update(['status' => 2]); }
      else { $this->model::where('id', $item->id)->update(['status' => 1]); }
    }

    $model = $this->model;
    if (request()->ajax()) {
      return DataTables::of($this->data)
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->editColumn('id_product', function ($order) { return $order->id_products->name; })
      ->editColumn('transaction_id', function ($order) { return '#' . implode('', str_split(sprintf('%05d',  $order->id), 3));; })
      ->editColumn('status', function ($order) {
        if ($order->status == 1) { return '<span class="label label-warning label-inline"> Pending </span>'; }
        else if ($order->status == 2) { return '<span class="label label-info label-inline"> In Progress </span>'; }
        else if ($order->status == 3) { return '<span class="label label-success label-inline"> Completed </span>'; }
        else if ($order->status == 4) { return '<span class="label label-danger label-inline"> Canceled </span>'; }
        else { return ''; }
      })
      ->editColumn('target', function ($order) { return '<a href="' . $order->target . '" target="_blank"><i class="text-primary icon-md fas fa-link"></i></a>'; })
      ->editColumn('price', function ($order) { return "Rp " . number_format($order->price, 2, ",", "."); })
      ->rawColumns(['description', 'status', 'target'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));

  }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function all() {
    $now = \Carbon\Carbon::now()->timestamp;
    $item = $this->model::get();
    foreach($item as $item) {
      if ($now - strtotime($item->created_at) > 300) { $this->model::where('id', $item->id)->update(['status' => 3]); }
      else if ($now - strtotime($item->created_at) > 60) { $this->model::where('id', $item->id)->update(['status' => 2]); }
      else { $this->model::where('id', $item->id)->update(['status' => 1]); }
    }

    $model = $this->model;
    if (request()->ajax()) {
      return DataTables::of($model::get())
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->editColumn('id_product', function ($order) { return $order->id_products->name; })
      ->editColumn('transaction_id', function ($order) { return '#' . implode('', str_split(sprintf('%05d',  $order->id), 3));; })
      ->editColumn('status', function ($order) {
        if ($order->status == 1) { return '<span class="label label-warning label-inline"> Pending </span>'; }
        else if ($order->status == 2) { return '<span class="label label-info label-inline"> In Progress </span>'; }
        else if ($order->status == 3) { return '<span class="label label-success label-inline"> Completed </span>'; }
        else if ($order->status == 4) { return '<span class="label label-danger label-inline"> Canceled </span>'; }
        else { return ''; }
      })
      ->editColumn('target', function ($order) { return '<a href="' . $order->target . '" target="_blank"><i class="text-primary icon-md fas fa-link"></i></a>'; })
      ->editColumn('price', function ($order) { return "Rp " . number_format($order->price, 2, ",", "."); })
      ->rawColumns(['description', 'status', 'target'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'all', compact('model'));

  }

}
