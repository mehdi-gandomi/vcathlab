<?php

namespace Modules\AccessLevel\Models\Base;

use Silber\Bouncer\Database\Role as BaseRoleModel;
use Illuminate\Support\Facades\DB;
use Silber\Bouncer\Database\Models;
use App\Models\User as UserModel;


class Role extends BaseRoleModel
{
	public $table = 'roles';

	public function attributesToArray()
	{
		$data = parent::attributesToArray();
		$data['abilities'] = $this->getAbilities();
		return $data;
	}

	public static function findFrom($entity_id, $which=0) {
		return Ability::
			g() // start search
			->on($entity_id, $which) // search queries
			->find() // do search and  return Eloquent Collection of matching abilities
			->map(fn ($ability) => $ability->roles->count()?$ability->roles->all():false) // roles from each ability
			->filter(fn ($roles) => !!$roles) //ignore false values
			->collapse() // collapse the collection of items into a single array
			->unique('id'); // prevent duplicate role results
	}

	protected function findPermissions() {
		return DB::table(Models::table('permissions'))
			->whereRaw("LOWER(`entity_type`) LIKE '%role%'")
			->where('entity_id', '=', $this->id);
	}

	public function hasPermissions() {
		return $this->findPermissions()->count();
	}

	public function getAbilities($raw = false) {
		$result = collect(Ability::find($this->findPermissions()->pluck('ability_id'))->all());
		return $raw ? $result : Ability::toPermissions($result);
	}

	public function deleteAbilities() {
		return $this->findPermissions()->delete();
	}

	public function storeAbilities($permissions) {
		$this->deleteAbilities(); // delete prev permissions for this Role
		$newAbilities = [];
		foreach($permissions as $target => $abilities)
			foreach($abilities as $whichAbility => $hasAbility) // $whichAbility is in 0 ... 6 And $hasAbility can be true or false
				if($hasAbility)
					$newAbilities [] = Ability::target($target)->can(Ability::TYPES[$whichAbility])->allowTo($this);
		return Ability::toPermissions($newAbilities);
	}

	public function getUsers(bool $raw = false, string $userClassName='') {
		$user_ids = DB::table(Models::table('assigned_roles'))->where('role_id', $this->id)->where('entity_type', 'LIKE', '%\User')->pluck('entity_id')->unique()->all();
		if($raw)
			return $user_ids;

		if(!$userClassName)
			$userClassName = UserModel::class;
		return $userClassName::find($user_ids);
	}
}
