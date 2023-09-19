<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $roles = explode('|', $role);
        foreach ($roles as $type) {
            if ($request->user()->role->name == $type ) {
                return $next($request);
            }
        }
        
        // abort(403, 'Anda tidak memiliki hak mengakses pada halaman tersebut!');
        return redirect()->back()->with('forbidden', '| Anda tidak memiliki hak untuk mengakses pada halaman tersebut!');
    }
}
