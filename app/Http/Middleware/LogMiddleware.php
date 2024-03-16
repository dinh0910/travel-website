<?php

namespace App\Http\Middleware;

use App\Models\Log as ModelsLog;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next)
  {
    if (strpos($request->path(), 'admin') !== false) {
      $requestData = [
        'request' => json_encode($request->all()),
        // 'request' => $request->headers->get('referer'),
        // 'endpoint' => $request->fullUrl(),
        // 'request' => $request,
        'type' => 'admin',
        'endpoint' => $request->path(),
        // Add more details as needed
      ];
    }

    ModelsLog::create($requestData);

    return $next($request);
  }
}
