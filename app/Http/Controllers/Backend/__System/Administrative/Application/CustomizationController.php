<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class CustomizationController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'role:master-administrator']; }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $data = \App\Models\Backend\__System\Administrative\Application\Customization::first();
    return view('pages.backend.__system.administrative.application.customization.index', compact('data'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request, $id) {
    \App\Models\Backend\__System\Administrative\Application\Customization::where('id', $id)->update([
      'sticky_toolbar' => $request->get('sticky_toolbar'),
    ]);
    return redirect('/dashboard/administratives/applications\customizations')->with('success', __('default.notification.success.customization-updated'));
  }

}
