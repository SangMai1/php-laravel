<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Route;

class saferequest
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

        $re = array(
            'POST' =>  '/aaaa',
            'GET' => '/bbbbb'
        );
        foreach($re as $key){
            if(strpos($key,'/')){
                echo $key;
                return $next($request);
            }
        }
        return redirect('yes');
    }
}
