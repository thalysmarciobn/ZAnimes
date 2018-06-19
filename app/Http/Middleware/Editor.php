<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Editor {
    public function handle($request, Closure $next, $rank) {
        if (Auth::check() && Auth::user()->editor >= $rank) {
            return $next($request);
        }
        return redirect('');
    }
}