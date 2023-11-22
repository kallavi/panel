<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class LocalizeMiddleware
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
      
        if (!in_array(request()->segment(1), config('app.supported_locales'))) {
            // app()->setLocale('tr');
           
            $base = url()->to('');
            $path = str_replace($base, '', $request->fullUrl());
            

            return redirect()->to($base . '/' . config('app.locale') . $path);
        }

        app()->setLocale(request()->segment(1));

        URL::defaults(['locale' => request()->segment(1)]);

        return $next($request);
    }
}
