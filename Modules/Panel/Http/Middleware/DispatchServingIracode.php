<?php

namespace Modules\Panel\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Modules\Panel\Events\ServingIracode;
use Modules\Panel\Iracode;

class DispatchServingIracode
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        if(Cookie::has("locale")) app()->setLocale(Cookie::get("locale"));
        Iracode::__constructStatic();
        ServingIracode::dispatch($request);

        return $next($request);
    }
}
