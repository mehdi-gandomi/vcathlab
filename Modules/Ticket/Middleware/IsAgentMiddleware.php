<?php

namespace Modules\Ticket\Middleware;

use Closure;
use Modules\Ticket\Models\Agent;
use Modules\Ticket\Models\Setting;

class IsAgentMiddleware
{
    /**
     * Run the request filter.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Agent::isAgent() || Agent::isAdmin()) {
            return $next($request);
        }

        return redirect()->route(Setting::grab('main_route'). '.index')
            ->with('warning', trans('ticket::lang.you-are-not-permitted-to-access'));
    }
}
