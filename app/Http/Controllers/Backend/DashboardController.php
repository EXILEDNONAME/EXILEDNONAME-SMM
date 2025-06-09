<?php

namespace App\Http\Controllers\Backend;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class DashboardController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth']; }

  public function index() {
    // Storage::disk('public')->put('list.csv', file_get_contents('https://micypedia.id/api/v2?key=a4c5969039e713a8780270b0b25bb66e&action=services'));
    $json = Storage::json(base_path('/storage/app/public/list.json'));
    $data = json_decode($json);
    return view('pages.backend.dashboard', compact('data'));
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
