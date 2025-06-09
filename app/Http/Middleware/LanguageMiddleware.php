<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LanguageMiddleware {
  public function handle($request, Closure $next) {
    if ($request->session()->has('locale')) {
      \App::setLocale($request->session()->get('locale'));
    }
    return $next($request);
  }
}
