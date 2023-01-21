<?php

namespace Modules\AccessLevel\Http\Middleware;

use Closure;
use  RoleManager; /* Silber\Bouncer\Bouncer as */
use App\Models\User;

use Modules\AccessLevel\Models\Base\{Ability, Role};

class CheckRole
{
	/**
	 * Fill in The "RoleManager".
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$_RollUser = User::find(1);
		$_RollManager = RoleManager::create($_RollUser)
		->tables(([
			'abilities' => 'abilities'
		]))
		->useAbilityModel(Ability::class)
		->useRoleModel(Role::class)
		->useUserModel(User::class);

		$request->merge(['_ruser' => $_RollUser, '_rmanager' => $_RollManager]);
		return $next($request);
	}
}
