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
use App\Models\Backend\__Main\WalletTransaction;

class WalletController extends Controller {

  function __construct() {
    $this->model = 'App\Models\Backend\__Main\Wallet';
    $this->path = 'pages.backend.__main.wallet.';
    $this->url = '/dashboard/wallets';
    $this->data = $this->model::get();
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
      ->editColumn('description', function ($order) { return nl2br(e($order->description)); })
      ->editColumn('price', function ($order) { return "Rp " . number_format($order->price, 2, ",", "."); })
      ->editColumn('rate', function ($order) { return "Rp " . number_format($order->price * 1000, 2, ",", "."); })
      ->rawColumns(['description'])
      ->addIndexColumn()->make(true);
    }
    return view($this->path . 'index', compact('model'));
  }

  public function checkout(Request $request) {
    $request->validate(['balance' => 'required|numeric|min:1000|max:100000']);
    $userId = Auth::id();
    $url = $this->url;
    $number = rand();
    $request->request->add([
      'id_order'      => $number,
      'id_user' => Auth::User()->id,
      'status' => 'Unpaid',
    ]);
    $order = WalletTransaction::create($request->all());


    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    \Midtrans\Config::$isProduction = false;
    \Midtrans\Config::$isSanitized = true;
    \Midtrans\Config::$is3ds = true;

    $params = array(
      'transaction_details' => array(
        'order_id' => $number,
        'gross_amount' => $request->balance,
      ),
      'customer_details' => array(
      'id' => Auth::user()->id,
        'firts_name' => Auth::user()->name,
      ),
      "custom_field1" => Auth::id(),
    );



    $snapToken = \Midtrans\Snap::getSnapToken($params);
    return view($this->path . 'checkout', compact('snapToken', 'order', 'url', 'userId'));
  }

  public function callback(Request $request) {

    $serverKey = config('midtrans.server_key');
    $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
    if($hashed == $request->signature_key){
      if($request->transaction_status == 'capture') {
        $order = WalletTransaction::where('id_order', $request->order_id);
        $order->update(['status' => 'Paid']);

        // ADD BALANCE
        $wallet = Wallet::where('id_user', $request->custom_field1)->first();
        $balance = $wallet->balance + $request->gross_amount;
        $wallet->update(['balance' => $balance]);
      }
    }
  }

}
