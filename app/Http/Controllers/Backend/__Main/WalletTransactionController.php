<?php

namespace App\Http\Controllers\Backend\__Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\__Main\WalletTransaction;
use Auth;

class WalletTransactionController extends Controller
{
  public function index() {
    return view('home');
  }

  public function checkout(Request $request) {
    $request->request->add(['status' => 'Unpaid']);
    $order = WalletTransaction::create($request->all());

    // Set your Merchant Server Key
    \Midtrans\Config::$serverKey = config('midtrans.server_key');
    // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
    \Midtrans\Config::$isProduction = false;
    // Set sanitization on (default)
    \Midtrans\Config::$isSanitized = true;
    // Set 3DS transaction for credit card to true
    \Midtrans\Config::$is3ds = true;

    $params = array(
      'transaction_details' => array(
        'order_id' => rand(),
        'gross_amount' => 10000,
      ),
      'customer_details' => array(
      'id' => Auth::user()->id,
        'name' => Auth::user()->name,
        'description' => $request->description,
      ),
    );

    $snapToken = \Midtrans\Snap::getSnapToken($params);
    return view('checkout', compact('snapToken', 'order'));

  }

  public function callback(Request $request) {
    $serverKey = config('midtrans.server_key');
    $hashed = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
    if($hashed == $request->signature_key){
      if($request->transaction_status == 'capture') {
        $order = WalletTransaction::find($order->id);
        $order->update(['status' => 'Paid']);
      }
    }
  }

}
