<?php

namespace Modules\AccessLevel\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Modules\AccessLevel\Core\Permissions;
use Modules\AccessLevel\Traits\HasTranslations;

class Menu extends Model
{
	use HasTranslations;

	public $table = 'menus';
	public static $js_prefix = 'm';

	public $fillable = [
		'title',
		'route',
		'icon_class',
		'ordering',
		'state',
		'open_in_blank',
		'open_in_iframe',
		'description',
		'created_at',
		'updated_at',

		'id',
		'subsystem_id',
		'menu_id'
	];
	public $translatable = ['title'];

	public function subsystem()
	{
		return $this->belongsTo(SubSystem::class);
	}

	public function parent()
	{
		return $this->belongsTo(Menu::class, 'menu_id');
	}
	public function children()
	{
		return $this->hasMany(Menu::class, 'menu_id')->with('children');
    }

	public function getAllowedRoles() {
		// to get "ability"s related about menu, which action, and what field
			// use AccessLevel\Permissions\Models\Ability;
			// return Ability::findFrom($this->id, Ability::TARGET_MENU);
		return Role::findFrom($this->id, Ability::TARGET_MENU) + Role::findFrom($this->id, Ability::TARGET_SUBSYSTEM);
	}

	/**
	 * getOrdering
	 * get Max Value of `ordering` in specified subsystem
	 *
	 * @param  int $subsystem_id
	 * @return int
	 */
	public static function getOrdering($subsystem_id) {
		$maxOrdering = static::where('subsystem_id', '=', $subsystem_id)->max('ordering');
		$maxOrdering = $maxOrdering ? intval($maxOrdering) : 0;
		$maxOrdering++; // increase ordering value
		return $maxOrdering;
	}

	public static function make($data) {
		if($data && !is_array($data))
			$data = @json_decode(json_encode($data), true);
		if(!$data)
			return null;

		$lang = preg_match('/[^A-Za-z0-9]/', $data['title'][0]) ? 'fa' : 'en';

		$menu = new static();
		$menu->title = [$lang => $data['title']];
		$menu->route = $data['route'];
		$menu->icon_class = Permissions::processIcon($data['icon_class']);
		$menu->ordering = static::getOrdering($data['subsystem_id']);
		$menu->subsystem_id = $data['subsystem_id'];
		if(isset($data['menu_id']))
			$menu->menu_id = $data['menu_id'];

		return $menu->save();
	}
}
