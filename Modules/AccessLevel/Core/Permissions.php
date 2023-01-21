<?php

namespace Modules\AccessLevel\Core;

use App\Models\User;
use Modules\AccessLevel\Models\Base\User as BaseUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Modules\AccessLevel\Models\Base\{Menu, Ability, SubSystem, UserActivity};

use Modules\AccessLevel\Http\Controllers\LoginController;

class Permissions
{
	/**
	 * @var string
	 */
	public static $baseNamespace;
	public static $controllersNamespace, $apiControllersNamespace , $modelsNamespace;
	public static $NSMap = [
		'controllers' => 'Http\Controllers',
		'apiControllers' => 'Http\Controllers\API',
		'models' => 'Models'
	];

	/**
	 * processIcon
	 *
	 * @param  string $icon_value
	 * @return string
	 */
	public static function processIcon($icon_value)
	{
		return str_replace('fa ', 'far ', $icon_value);
	}

	/**
	 * processTarget
	 *
	 * @param  string|int|bool $open_in_blank
	 * @param  string|int|bool $open_in_iframe
	 * @return string
	 */
	protected static function processTarget($open_in_blank, $open_in_iframe)
	{
		$target = "_self";
		if(intval($open_in_blank))
			$target = "_blank";
		return $target;
	}

	/**
	 * getSubSystemsTree
	 *
	 * @return array
	 */
	public static function getSubSystemsTree()
	{
		$SubSystems = [];
		$_SubSystems = collect(SubSystem::with(['menus', 'menus.parent', 'menus.children'])->get())->sortBy('ordering');
		foreach ($_SubSystems as $_SubSystem) {
			$SubSystem = [
				'label' => $_SubSystem->title,
				'id' => SubSystem::$js_prefix . $_SubSystem->id,
				'icon' => static::processIcon($_SubSystem->icon_class)
			];

			$menu_ids = []; // prevent duplicate insertation to array
			$Menus = [];
			$_Menus = collect($_SubSystem->menus->whereNull('menu_id'))->sortBy('ordering');
			foreach ($_Menus as $_Menu) {
				$menu_id = $_Menu->id;
				if (isset($menu_ids[$menu_id]))
					continue;

				$Menu = [
					'label' => $_Menu->title,
					'id' => Menu::$js_prefix . $_Menu->id,
					'icon' => static::processIcon($_Menu->icon_class)
				];

				if ($_Menu->children) {
					$IMenus = [];
					foreach ($_Menu->children as $_IMenu) {
						$_menu_id = $_IMenu->id;
						if (isset($menu_ids[$_menu_id]))
							continue;

						$IMenu = [
							'label' => $_IMenu->title,
							'id' => Menu::$js_prefix . $_IMenu->id,
							'icon' => static::processIcon($_IMenu->icon_class)
						];

						$IMenus[] = $IMenu;
						$menu_ids[$_menu_id] = true;
					}
					if (count($IMenus)) {
						usort($IMenus, function ($item1, $item2) {
							if(!(isset($item1['ordering']) && isset($item1['ordering']))) return 0;
							if ($item1['ordering'] == $item2['ordering']) return 0;
							return ($item1['ordering'] < $item2['ordering']) ? -1 : 1;
						});
						$Menu['children'] = $IMenus;
					}
				}
				$Menus[] = $Menu;
				$menu_ids[$menu_id] = true;
				// $_counter++;
			}

			// if($_Menu->parent)
			// 	dd([$_Menu->id, $_Menu->parent]);

			$SubSystem['children'] = $Menus;
			$SubSystems[] = $SubSystem;
		}
		return $SubSystems;
	}

	/**
	 * buildSidebarMenu
	 *
	 * @param  array|\Illuminate\Database\Eloquent\Collection $permissions
	 * @return array
	 */
	public static function buildSidebarMenu($permissions)
	{
		if(gettype($permissions) != 'array')
			$permissions = Ability::toPermissions($permissions);

		$SubSystems = [];
		$_SubSystems = collect(SubSystem::with(['menus', 'menus.parent', 'menus.children'])->get())->sortBy('ordering');
		foreach ($_SubSystems as $_SubSystem) {
			if(!isset($permissions[SubSystem::$js_prefix . $_SubSystem->id]))
				continue;

			$SubSystem = [
				'name' => $_SubSystem->title,
				'url' => null,
				'slug' => SubSystem::$js_prefix . $_SubSystem->id,
				'icon' => static::processIcon($_SubSystem->icon_class)
			];

			$menu_ids = []; // prevent duplicate insertation to array
			$Menus = [];
			$_Menus = collect($_SubSystem->menus->whereNull('menu_id'))->sortBy('ordering');
			foreach ($_Menus as $_Menu) {
				$menu_id = $_Menu->id;
				if (isset($menu_ids[$menu_id]) || !isset($permissions[Menu::$js_prefix . $_Menu->id]))
					continue;

				$Menu = [
					'name' => $_Menu->title,
					'url' => $_Menu->route,
					'target' => static::processTarget($_Menu->open_in_blank, $_Menu->open_in_iframe),
					'slug' => Menu::$js_prefix . $_Menu->id,
					'icon' => static::processIcon($_Menu->icon_class)
				];

				if ($_Menu->children) {
					$IMenus = [];
					foreach ($_Menu->children as $_IMenu) {
						$_menu_id = $_IMenu->id;
						if (isset($menu_ids[$_menu_id]) || !isset($permissions[Menu::$js_prefix . $_IMenu->id]))
							continue;

						$IMenu = [
							'name' => $_IMenu->title,
							'url' => $_IMenu->route,
							'target' => static::processTarget($_IMenu->open_in_blank, $_IMenu->open_in_iframe),
							'slug' => Menu::$js_prefix . $_IMenu->id,
							'icon' => static::processIcon($_IMenu->icon_class)
						];

						$IMenus[] = $IMenu;
						$menu_ids[$_menu_id] = true;
					}
					if (count($IMenus)) {
						usort($IMenus, function ($item1, $item2) {
							if(!(isset($item1['ordering']) && isset($item1['ordering']))) return 0;
							if ($item1['ordering'] == $item2['ordering']) return 0;
							return ($item1['ordering'] < $item2['ordering']) ? -1 : 1;
						});
						$Menu['submenu'] = $IMenus;
					}
				}
				$Menus[] = $Menu;
				$menu_ids[$menu_id] = true;
				// $_counter++;
			}

			if (count($Menus)) {
				$SubSystem['submenu'] = $Menus;
				$SubSystems[] = $SubSystem;
			}
		}
		return $SubSystems;
	}

	public static function authenticate(Request $request) {
                $validator = Validator::make($request->all(), [
                    "email" => 'required|string',
                    'password' => 'required|string'
                ]);
                if ($validator->fails()) return false;
                if(!session()->get("is_captcha_validated")) return false;
                $user = User::where('email', $request->email)->first();
	      if(!$user)
	      	UserActivity::wrongPassword($request->email);
                if ($user &&
                    Hash::check($request->password, $user->password)) {
	        	if(!$user->getCurrentState()) {
			        UserActivity::restricted($user);
			        return false;
		}
		UserActivity::login($user);
                    return $user;
                }
	      UserActivity::wrongPassword($user);
            }

	public static function generateMenus()
	{
		$user = BaseUser::getCurrent(User::class);
		if(!$user) {
			app(LoginController::class)->logout();
			return [];
		}
		// return $user ? Permissions::buildSidebarMenu($user->getAbilities()) : [];

		return Permissions::buildSidebarMenu($user->getAbilities());
	}

    // Build wonderful things
}

Permissions::$baseNamespace = 'Modules\AccessLevel'; // can set dynamically
foreach(Permissions::$NSMap as $name => $path)
	Permissions::${$name.'Namespace'} = Permissions::$baseNamespace.'\\'.$path;
