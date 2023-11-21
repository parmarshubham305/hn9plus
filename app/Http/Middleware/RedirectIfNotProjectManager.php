<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfNotProjectManager {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = 'project_manager') {
        if (!\Auth::guard($guard)->check()) {
            return redirect('project-manager/login');
        }
        
        return $next($request);
    }
}
