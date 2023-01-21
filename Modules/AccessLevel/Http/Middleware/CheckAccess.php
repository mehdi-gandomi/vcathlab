<?php

namespace Modules\AccessLevel\Http\Middleware;

use Closure;

use App\Models\User;
use Modules\AccessLevel\Models\Base\User as BaseUser;
use Modules\AccessLevel\Models\Base\Ability;

class CheckAccess
{
	public function handle($request, Closure $next, $menu)
	{
		$actionsMap = [
			'store' => 'Create',
			'index' => 'View',
			'show' => 'View',
			'update' => 'Update',
			'destroy' => 'Delete',
			'multiDelete' => 'Delete',
			'export' => 'Download'
		];

		$user = BaseUser::getCurrent(User::class);
		$currentAction = $request->route()->getActionMethod();
		if(strtolower($currentAction) == 'index')
			$currentAction = 'view';

		if(isset($actionsMap[$currentAction]))
			if(!$user->can(Ability::can($actionsMap[$currentAction])->on($menu)->get()))
				return response([], 403);

		return $next($request);
	}
}
