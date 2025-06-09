<?php

namespace App\Http\Controllers\Backend\__System\Administrative\Application;

use App\Http\Controllers\Controller;
use App\Http\Traits\Backend\__System\Controllers\Datatable\DefaultController;
use App\Http\Traits\Backend\__System\Controllers\Datatable\ExtensionController;
use Illuminate\Routing\Controllers\HasMiddleware;
use Redirect, Response;

class OptimizationController extends Controller implements HasMiddleware {

  public static function middleware(): array { return ['auth', 'role:master-administrator']; }

  use DefaultController;
  use ExtensionController;

  function __construct() {
    $this->model = 'App\Models\Backend\__System\Administrative\Application\Optimization';
    $this->path = 'pages.backend.__system.administrative.application.optimization.';
    $this->url = '/dashboard/administratives/applications/optimizations';
    if (request('date_start') && request('date_end')) { $this->data = $this->model::orderby('date_start', 'desc')->whereBetween('date_start', [request('date_start'), request('date_end')])->get(); }
    else { $this->data = $this->model::get(); }
  }

  /**
  **************************************************
  * @return OPTIMIZE
  **************************************************
  **/

  public function start_optimizing($id) {
    if ($id == 1) {
      $data = \Artisan::call('optimize:clear');
      return Response::json($data);
    }
    if ($id == 2) {
      $data = system('composer dump-autoload');
      return Response::json($data);
    }
  }

}
