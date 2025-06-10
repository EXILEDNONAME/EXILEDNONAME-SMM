<?php

namespace App\Http\Controllers\Backend\__Main;

use Auth;
use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use DataTables;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use App\Models\Backend\__Main\Product;

class OrderController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth']; }

  function __construct() {
    $this->model = 'App\Models\Backend\__Main\Transaction';
    $this->path = 'pages.backend.__main.order.';
    $this->url = '/dashboard/orders';
    $this->data = $this->model::get();
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

    $model = $this->model::take(3)->where('id_user', Auth::user()->id)->orderby('created_at', 'desc')->get();
    $url = $this->url;
    if (request()->ajax()) {
      return DataTables::of(Product::get())
      ->editColumn('date_start', function ($order) { return empty($order->date_start) ? NULL : \Carbon\Carbon::parse($order->date_start)->format('d F Y, H:i'); })
      ->editColumn('date_end', function ($order) { return empty($order->date_end) ? NULL : \Carbon\Carbon::parse($order->date_end)->format('d F Y, H:i'); })
      ->editColumn('price', function ($order) { return "Rp " . number_format($order->price, 2, ",", "."); })
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->rawColumns(['description', 'show'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model', 'url'));
  }

  /**
  **************************************************
  * @return SHOW
  **************************************************
  **/

  public function show($id) {
    $url = $this->url;
    if ($id == 1) {
      $product = Product::where('id', $id)->first();
      return view($this->path . 'product.product-1', compact('product', 'url'));
    }
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(Request $request) {
    $request->validate(['quantity' => 'required|numeric|min:50|max:100']);
    $store = $request->all();
    $this->model::create($store);

    $data = Product::where('id', $request->id_product)->first();

    // AUTOMATION
    $api = env('API_SMM', '');
    $service = $data->id_service;
    $link = $request->target;
    $url = "https://micypedia.id/api/v2?key=$api&action=add&service=$service&link=$link";
    $automation = Http::get($url);

    return redirect($this->url)->with('success', __('default.notification.success.item-created'));
  }

}
