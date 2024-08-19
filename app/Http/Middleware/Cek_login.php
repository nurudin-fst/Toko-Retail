<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Cek_login
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
    // return $next($request);
    $user = \App\Models\User::where('email', $request->email)->first();
    if (Auth::user()->level == 'Admin') {
      return $next($request);
    } else if (Auth::user()->level == 'Customer') {
      return $next($request);
    } else {
      return redirect('/');
    }
  }
}
