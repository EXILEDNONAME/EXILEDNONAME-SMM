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
use App\Models\Backend\__Main\Wallet;

class OrderController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth']; }

  function __construct() {
    $this->model = 'App\Models\Backend\__Main\Transaction';
    $this->balance = 'App\Models\Backend\__Main\Wallet';
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
    $product = Product::where('id', $id)->first();
    if ($id == 1) { return view($this->path . 'product.product-1', compact('product', 'url')); }
    if ($id == 2) { return view($this->path . 'product.product-2', compact('product', 'url')); }
    if ($id == 3) { return view($this->path . 'product.product-3', compact('product', 'url')); }
    if ($id == 4) { return view($this->path . 'product.product-4', compact('product', 'url')); }
    if ($id == 5) { return view($this->path . 'product.product-5', compact('product', 'url')); }
  }

  /**
  **************************************************
  * @return STORE
  **************************************************
  **/

  public function store(Request $request) {
    if(!empty($this->balance::where('id_user', Auth::user()->id)->first())) {
      $set = $this->balance::where('id_user', Auth::user()->id)->first();
      $getbalance = $set->balance;
    } else { $getbalance = 0; }

    if ($getbalance < $request->get('price')){
      return redirect()->back()->with('error', 'Your Balance is Insufficient');
    }
    else {
      Wallet::where('id_user', Auth::user()->id)->update([
        'balance' => $getbalance - $request->get('price'),
      ]);

      if($request->id_product == 1) { $request->validate(['quantity' => 'required|numeric|min:100|max:10000']); }
      if($request->id_product == 2) { $request->validate(['quantity' => 'required|numeric|min:100|max:10000']); }
      if($request->id_product == 3) { $request->validate(['quantity' => 'required|numeric|min:10|max:10000']); }
      if($request->id_product == 4) { $request->validate(['quantity' => 'required|numeric|min:10|max:10000']); }
      if($request->id_product == 5) { $request->validate(['quantity' => 'required|numeric|min:10|max:10000']); }

      // AUTOMATION
      $data = Product::where('id', $request->id_product)->first();
      $api = env('API_SMM', '');
      $service = $data->id_service;
      $link = $request->target;
      $quantity = $request->quantity;
      $url = "https://micypedia.id/api/v2?key=$api&action=add&service=$service&link=$link&quantity=$quantity";
      $automation = Http::get($url);
      $item = json_decode($automation);

      $store = $request->all();
      $store['id_order'] = $item->order;
      $this->model::create($store);

      return redirect($this->url)->with('success', __('default.notification.success.item-created'));
    }

  }

}
