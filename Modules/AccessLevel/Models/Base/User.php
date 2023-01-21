<?php
namespace Modules\AccessLevel\Models\Base;

use App\Models\User as BaseUser;
use Modules\AccessLevel\Traits\HasRolesAndAbilities;
use Illuminate\Support\Facades\Auth;

class User extends BaseUser
{
    use HasRolesAndAbilities;

    /**
	 * currentUser
	 *
	 * @param  string $userClassName
	 * @return UserModel|null
	 */
	public static function getCurrent(string $userClassName='') {
		if(!$userClassName)
			$userClassName = UserModel::class;

		$loggedUser = Auth::user() ?? Auth::guard('sanctum')->user();
		return $loggedUser ? (get_class($loggedUser) == $userClassName ? $loggedUser : $userClassName::find($loggedUser->id)) : null;
	}

	/**
	 * getUser
	* normalize $user to App\User
	 *
	 * @param  mixed|UserModel $user
	 * @return UserModel
	 */
	public static function normalize($user=null) {
		if(!$user)
			return static::getCurrent();
		if(!$user instanceof UserModel)
			$user = UserModel::find($user->id);
		return $user;
	}
}
