<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (Auth::check()){
            $user = Auth::user();
            if ($user->role === User::ROLE_ADMIN || $user->role === User::ROLE_MANAGER ) {
                return $next($request);
            }
        }
        return redirect('home')->with('message','Permission denied');
    }
}
