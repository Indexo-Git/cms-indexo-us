<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param null $guard
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null): Response|RedirectResponse
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect()->guest('login');
            }
        } else if (Auth::guard($guard)->user()->is_admin != 1) {
            Auth::logout();
            return redirect()->to('/');
        }
        return $next($request);
    }
}
