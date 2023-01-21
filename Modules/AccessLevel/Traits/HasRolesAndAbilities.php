<?php

namespace Modules\AccessLevel\Traits;

use Silber\Bouncer\Database\HasRolesAndAbilities as HasRolesAndAbilitiesBase;
use App\Models\User;
use Modules\AccessLevel\Models\Base\Role;
use Modules\AccessLevel\Models\Base\Ability;

trait HasRolesAndAbilities {

	use HasRolesAndAbilitiesBase {
		HasRolesAndAbilitiesBase::getAbilities as getAbilitiesBase;
	}

	public function getAbilities() {
		$abilities = [];
		$abilities []=$this->getAbilitiesBase()->map(fn($ability) => Ability::where('name', '=', $ability->name)->first());
		$user_roles = $this->getRoles();
		foreach($user_roles as $role)
			$abilities []= Role::where('name', '=', $role)->first()->getAbilities(true);
		return collect($abilities)->collapse()->unique('id');
	}

	public function getCurrentState() {
		if(!$this->state)
			return false;
		$user = User::find($this->id);
		if($user->master)
			return true;
		$user_roles = $user->getRoles();
		foreach($user_roles as $role) {
			$_Role = Role::where('name', '=', $role)->first();
			if(/* $_Role->state &&  */$_Role->hasPermissions())
				return true;
		}
		return false;
	}
}
