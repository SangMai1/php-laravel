<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;
class ghilog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $stdout = fopen('php://stdout', 'w');
        // fwrite($stdout, "Start " . Route::currentRouteName() . date("Y-m-d H:i:s") . "\n");
        // $r = $next($request);

        // fwrite($stdout, "End " . Route::currentRouteName() . date("Y-m-d H:i:s") . "\n");
        // return redirect('khongcoquyen');
    }
}
