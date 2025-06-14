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

    // AUTO UPDATE
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
      return DataTables::of(Product::where('active', 1)->orderby('name', 'asc')->get())
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
    if ($id == 6) { return view($this->path . 'product.product-6', compact('product', 'url')); }
    if ($id == 7) { return view($this->path . 'product.product-7', compact('product', 'url')); }
    if ($id == 8) { return view($this->path . 'product.product-8', compact('product', 'url')); }
    if ($id == 9) { return view($this->path . 'product.product-9', compact('product', 'url')); }
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
      return redirect()->back()->with('error', 'Saldo anda tidak mencukupi.');
    }
    else {
      if($request->id_product == 1) {
        $request->validate(['quantity' => 'required|numeric|min:100|max:10000']);
        $transaction = $this->model::where(['id_user' => Auth::User()->id, 'id_product' => 1])->orderby('created_at', 'desc')->first();
        $now = \Carbon\Carbon::now()->timestamp;
        if (!empty($transaction->status) && $transaction->status < 3) {
          if ($now - strtotime($transaction->created_at) < 300) {
            $set = $now - strtotime($transaction->created_at);
            $time = (300 - $set) / 60;
            return redirect()->back()->with('error', 'Harap menunggu ±' . number_format($time, 0, ",", ".") . ' menit untuk bisa order produk ini lagi.');
          }
        }
      }
      if($request->id_product == 2) { $request->validate(['quantity' => 'required|numeric|min:100|max:10000']); }
      if($request->id_product == 3) { $request->validate(['quantity' => 'required|numeric|min:10|max:10000']); }
      if($request->id_product == 4) { $request->validate(['quantity' => 'required|numeric|min:10|max:10000']); }
      if($request->id_product == 5) { $request->validate(['quantity' => 'required|numeric|min:10|max:10000']); }
      if($request->id_product == 6) { $request->validate(['quantity' => 'required|numeric|min:10|max:10000']); }
      if($request->id_product == 7) { $request->validate(['quantity' => 'required|numeric|min:10|max:10000']); }
      if($request->id_product == 8) { $request->validate(['quantity' => 'required|numeric|min:10|max:10000']); }
      if($request->id_product == 9) {
        $request->validate(['quantity' => 'required|numeric|min:10|max:10000']);
        $transaction = $this->model::where(['id_user' => Auth::User()->id, 'id_product' => 9])->orderby('created_at', 'desc')->first();
        $now = \Carbon\Carbon::now()->timestamp;
        if (!empty($transaction->status) && $transaction->status < 3) {
          if ($now - strtotime($transaction->created_at) < 900) {
            $set = $now - strtotime($transaction->created_at);
            $time = (900 - $set) / 60;
            return redirect()->back()->with('error', 'Harap menunggu ±' . number_format($time, 0, ",", ".") . ' menit untuk bisa order produk ini lagi.');
          }
        }
      }

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

      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.fonnte.com/send', CURLOPT_RETURNTRANSFER => true, CURLOPT_ENCODING => '', CURLOPT_MAXREDIRS => 10, CURLOPT_TIMEOUT => 0, CURLOPT_FOLLOWLOCATION => true, CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1, CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array(
          'target' => env('APP_NUMBER', ''),
          'message' => '## ORDER
Name : ' . Auth::user()->name . '
Price : ' . $request->price . '
Phone : ' . Auth::user()->phone . '
Product : ' . $data->name . '
Quantity : ' . $request->quantity . '
Link : ' . $request->target,
'countryCode' => '62'),
        CURLOPT_HTTPHEADER => array('Authorization: ' . env('APP_API', '')),
      ));
      curl_exec($curl);

      Wallet::where('id_user', Auth::user()->id)->update([
        'balance' => $getbalance - $request->get('price'),
      ]);

      return redirect($this->url)->with('success', __('default.notification.success.item-created'));
    }

  }

}
