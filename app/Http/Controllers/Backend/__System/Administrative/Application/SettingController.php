<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class SettingController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'role:master-administrator']; }

  /**
  **************************************************
  * @return INDEX
  **************************************************
  **/

  public function index() {
    $data = \App\Models\Backend\__System\Administrative\Application\Setting::first();
    return view('pages.backend.__system.administrative.application.setting.index', compact('data'));
  }

  /**
  **************************************************
  * @return UPDATE
  **************************************************
  **/

  public function update(Request $request, $id) {
    \App\Models\Backend\__System\Administrative\Application\Setting::where('id', $id)->update([
      'application_name' => $request->get('application_name'),
      'application_version' => $request->get('application_version'),
    ]);
    return redirect('/dashboard/administratives/applications/settings')->with('success', __('default.notification.success.setting-updated'));
  }

}
