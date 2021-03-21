<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetDesiredLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $lang = config('app.locale');

        if ($locale = request('locale')) {
            session(compact('locale'));
        }

        \App::setLocale(session('locale', $lang));

        return $next($request);
    }
}
