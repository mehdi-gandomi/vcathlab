<?php

namespace Modules\AccessLevel\Http\Middleware;

use Closure;

use Modules\Panel\Iracode;
use Modules\AccessLevel\Core\Permissions;

class DefineMenus
{
	public function handle($request, Closure $next)
	{
		// dd('DefineMenus - menus');
		// dd(Permissions::generateMenus()); // @TODO
	    Iracode::initializeMenus(Permissions::generateMenus());
        return $next($request);
	}
}
