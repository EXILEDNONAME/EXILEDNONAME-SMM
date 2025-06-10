<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Models\Backend\__Main\Transaction;

class DashboardController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth']; }

  function __construct() {
    $this->model = 'App\Models\Backend\__Main\Transaction';
  }

  public function index() {
    $now = \Carbon\Carbon::now()->timestamp;
    $item = $this->model::get();
    foreach($item as $item) {
      if ($now - strtotime($item->created_at) > 300) { $this->model::where('id', $item->id)->update(['status' => 3]); }
      else if ($now - strtotime($item->created_at) > 60) { $this->model::where('id', $item->id)->update(['status' => 2]); }
      else { $this->model::where('id', $item->id)->update(['status' => 1]); }
    }

    $model = Transaction::take(5)->where('id_user', Auth::user()->id)->orderby('created_at', 'desc')->get();
    return view('pages.backend.dashboard', compact('model'));
  }

  public function file_manager() {
    return view('pages.backend.__system.file-manager.index');
  }

  public function language($language = '') {
    request()->session()->put('locale', $language);
    return redirect()->back();
  }

  public function logout(Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
  }

}
