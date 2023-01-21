<?php

namespace Modules\AccessLevel\Http\Controllers;

use Modules\AccessLevel\Core\Permissions;

use Modules\AccessLevel\Models\Base\{Menu, Ability, SubSystem};
// use Silber\Bouncer\Bouncer as RoleManager;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RoleManager;

class RoleController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request)
	{
		//
	}

	public function getTree()
	{
		return Permissions::getSubSystemsTree();
	}

	public function allow(Request $request)
	{

		// $user->assign('superuser');
		// $user->allow('view');

		$_RollUser = $request->get('_ruser');
		RoleManager::allow($_RollUser)->to(Ability::can('Edit')->on(4)->get());
		return 'Done!';
	}

	public function allowAdmin(Request $request)
	{
		$menu_id = 5;
		// dd(Ability::g('edit-#3#'));
		// dd([Ability::can('Edit')->on($menu_id)->on('province')->g(), Ability::can('Edit')->menu($menu_id)->on('province')->g(), Ability::can('Edit')->subsystem($menu_id)->on('province')->g(), Ability::can('Edit')->subsystem($menu_id)->query(), Ability::can('Edit')->in('province')->query()]);
		// $_RoleManager = $request->get('_rmanager');
		RoleManager::assign('admin')->to($request->get('_ruser'));
		// RoleManager::allow('admin')->to(Ability::can('Edit')->on($menu_id)->get());     //'edit-@3'
		// RoleManager::allow('admin')->to(Ability::can('Create')->on($menu_id, Ability::TARGET_MENU)->get());     //'edit-@3'
		// RoleManager::allow('admin')->to(Ability::can('Create')->on($menu_id, Ability::TARGET_SUBSYSTEM)->get());     //'edit-@3'
		// RoleManager::allow('admin')->to(Ability::can('Delete')->menu($menu_id)->get());     //'edit-@3'
		// RoleManager::allow('admin')->to(Ability::can('Delete')->subsystem($menu_id)->get());     //'edit-@3'
		return 'Done!';
	}
	// .province
	public function check(Request $request)
	{
		//         $_RollUser = $request->get('_ruser');
		//         $abilities = $_RollUser->getAbilities();

		// مشخص کردن اینکه یک منو داخل چ گروه کاری هایی هست
		return collect(Ability::where('name', 'LIKE', "%-base-city%")->with('roles')->get())->map(fn ($ability) => $ability->roles)->unique('id');

		// مشخص کردن اینکه یک زیر سیستم داخل چ گروه کاری هایی هست
		return collect(Ability::where('name', 'LIKE', "%-base-%")->with('roles')->get())->map(fn ($ability) => $ability->roles)->unique('id');
	}

	public function rollz(Request $request)
	{
		dd(Ability::find(14)->parse()->on());


		$user = User::find(1);
		// dd(Ability::g()->on(5)->find());

		// Ability::can('Create')->get()


		// dd(Ability::can('Create')->on(7)->commit());
		// Ability::autoTitle(fn($action, $menu_id, $field) => implode('#$#', [$action, $menu_id, $field]));

		$user->allow(Ability::can('Create')->on(9)->get());
		$user->allow(Ability::can('Create')->on(9)->on('title')->get());
		$user->allow(Ability::can('Edit')->on(5)->get());
		$user->allow(Ability::can('Delete')->on(5)->get());
		$user->allow(Ability::can('Create')->on(5)->get());
		$user->allow(Ability::can('View')->on(5)->get());

		dd(Ability::can('Create')->on(5)->getTable());

		dd($user->getAbilities());
		/* Ability::can('Create')->on(5)->get()->allowTo('moder');
		Ability::can('Edit')->on(5)->get()->allowTo('moder');

		dd(Ability::can('Create')->on(5)->get()->roles); */


		// Ability::autoTitle(null);
		// Ability::check();
		// die(-1);
		// dd(Ability::can('Edit')->on(5)->get());

		// $_RollManager = $request->get('_rmanager');

		$user = User::find(1);
		$user->allow(Ability::can('Create')->on(7)->get());

		$user->allow(Ability::can('Create')->on(7)->in('title')->get());

		$user->allow(Ability::can('Edit')->on(5)->get());
		$user->allow(Ability::can('Delete')->on(5)->get());
		$user->allow(Ability::can('Create')->on(5)->get());
		$user->allow(Ability::can('View')->on(5)->get());

		/* $user->allow(Ability::can('Edit')->on(5)->get());
		$user->allow(Ability::can('Delete')->on(5)->get());
		$user->allow(Ability::can('Create')->on(5)->get());
		$user->allow(Ability::can('View')->on(5)->get());
		$user->allow(Ability::can('Download')->on(5)->get());
		$user->allow(Ability::can('Upload')->on(5)->get());

		$user->forbid(Ability::can('Delete')->on(5)->get());

		$user->allow(Ability::can('Edit')->on(5)->on('name')->get()); */


		return $user->getAbilities();

		// return get_class(RoleManager::ability()->firstOrCreate(['name' => 'edit-post']));
		// return get_class(Ability::find(1)) === get_class(RoleManager::ability()->firstOrCreate(['name' => 'edit-post'])) ? 'Yeah!' : ':/';
	}

	public function checkAbility()
	{
		Ability::g()->on(5)->find()->get()->each(function ($ability) {
			echo ($ability->name . PHP_EOL);
		});


		dd(Ability::findRolesOf(5));

		// dd(Ability::can('Make')->on(5)->title('Make#7')->title()); // set temporary title, needs to be "committed"
		dd( /// change abilty title for record "make" on "5"
			Ability::can('Make')->on(5) // get generator with "make" & "5"
				->title('Make#5') // set new tile
				->commit() // store into database and return record
				->parse() // get generator from database record
				->title() // get title from generator
		);

		/* dd(Ability::can('Create')->on(7)->commit());
		
		dd(User::find(1)->getAbilities()->map(fn ($ability) => $ability->parse()->can()));

		$t_ability = Ability::can('Create')->on(7)->on('title')->commit();

		dd($t_ability->parse()->on());

		dd($t_ability->id === $t_ability->parse()->commit()->id); */

		dd(Ability::g(
			Ability::can('Create')->on(7)->on('title')->title('قابلیت جدید')->commit() // send parameter as Ability
		)->title()); // parse ability query and return "on"

		// dd(Ability::can('Edit')->on(4)->commit());
		// dd(Ability::can('Edit')->on(4)->find()->get());
		Ability::can('Create')->on(4)->on('icon')->allowTo('admin');
		Ability::can('Create')->on(4)->on('title')->allowTo('admin');
		Ability::can('Create')->on(4)->on('state')->allowTo('admin');

		dd(Ability::g()->on(4)->find()->get());
		Ability::g()->on(4)->find()->each(function ($ability) {
			echo ($ability->name);
		});


		dd(Ability::can('Edit')->on(5)->find(1)->with('roles')->get()->map(fn ($ability) => $ability->roles));

		dd(Ability::can('Edit')->on(5)->commit());
		dd(Ability::g()->can('Edit')->on(5)->commit());


		// dd(self::g()->can('Edit')->on(4)->on('X')->g());
	}

	public function checkFields(Request $request, $menu)
	{
		// $_RollManager = $request->get('_rmanager');

		//         RoleManager::allow('t_admin')->to('edit-base-city.title');
		//         RoleManager::allow('t_admin')->to('edit-base-city.province');
		//         RoleManager::allow('t_admin')->to('edit-base-city.state');
		return collect(RoleManager::role()->firstOrCreate(['name' => 't_admin'])->getAbilities())->filter(fn ($ability) => strpos($ability->name, $menu . '.'));
	}

	public function showAMenu(Request $request)
	{
		return Menu::find(3)->getAllowedRoles();
	}

	public function copyData($source)
	{
		if ($source == 'subsystem') {
			$_SubSystems = [];
			$subsystems = DB::select('SELECT * FROM `subsystem`');
			foreach ($subsystems as $subsystem) {
				$_SubSystem = new SubSystem;
				$_SubSystem->id = $subsystem->id;

				$_SubSystem->title = ['fa' => $subsystem->title, 'en' => $subsystem->title_en];
				$_SubSystem->ordering = $subsystem->ordering;
				$_SubSystem->icon_class = 'fa ' . $subsystem->icon_class;
				if ($subsystem->header_title) {
					$_SubSystem->header_title = ['fa' => $subsystem->header_title];
				}

				$_SubSystem->save();
				$_SubSystems[] = $_SubSystem;
			}
			return $_SubSystems;
		}

		$_Menus = [];
		$menus = DB::select('SELECT * FROM `menu`');
		DB::statement('SET FOREIGN_KEY_CHECKS = 0');
		foreach ($menus as $menu) {
			$_Menu = new Menu;
			$_Menu->id = $menu->id;

			$_Menu->title = ['fa' => $menu->title, 'en' => $menu->title_en];
			$_Menu->ordering = $menu->ordering;
			$_Menu->icon_class = 'fa ' . $menu->icon_class;
			$_Menu->route = $menu->route;
			$_Menu->state = $menu->state;
			$_Menu->open_in_blank = $menu->open_in_blank;
			$_Menu->open_in_iframe = $menu->open_in_iframe;

			$_Menu->subsystem_id = $menu->subsystem_id;
			$_Menu->menu_id = $menu->menu_id;

			$_Menu->save();
			$_Menus[] = $_Menu;
		}
		DB::statement('SET FOREIGN_KEY_CHECKS = 1');

		return $_Menus;
	}

	public function checkData($source)
	{
		app()->setLocale('fa');

		//         return SubSystem::find(1)->menus;
		//         return Menu::find(1)->subsystem;

		//         return (SubSystem::with('menus')->get());

		/* $_Menus = Menu::get();
return $_Menus;

$_SubSystems = SubSystem::get();
return $_SubSystems;
foreach ($_SubSystems as $key => $_SubSystem) {
return $_SubSystem->title;
} */
	}

	public function getTree_A()
	{
		// dd(Menu::find(5)->with('children'));

		// $_counter = 0;

		$SubSystems = [];
		$_SubSystems = collect(SubSystem::with(['menus', 'menus.parent', 'menus.children'])->get())->sortBy('ordering');
		foreach ($_SubSystems as $_SubSystem) {
			$SubSystem = [
				'label' => $_SubSystem->title,
				'id' => SubSystem::$js_prefix . $_SubSystem->id,
				'icon' => Permissions::processIcon($_SubSystem->icon_class)
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
					'icon' => Permissions::processIcon($_Menu->icon_class),
					// 'ordering' => $_Menu->ordering
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
							'icon' => Permissions::processIcon($_IMenu->icon_class),
							// 'ordering' => $_IMenu->ordering
						];

						$IMenus[] = $IMenu;
						$menu_ids[$_menu_id] = true;

						// $_counter++;
					}
					if (count($IMenus)) {
						usort($IMenus, function ($item1, $item2) {
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
		/* 		$result = [];
		$result['data'] = $SubSystems;
		$result[0] = $_counter; */
		return $SubSystems;
	}
}
