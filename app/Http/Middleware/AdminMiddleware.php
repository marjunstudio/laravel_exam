<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->is_admin == true) {
            return $next($request);
        }

        // redirectabort(403, '権限がありません。');
        return back()->with('msg', '権限がありません。')->with('type', 'error');

    }
}