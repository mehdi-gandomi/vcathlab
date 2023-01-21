<?php

namespace Modules\AccessLevel\Models\Base;

use App\User;
use Error;
use Silber\Bouncer\Database\Ability as BaseAbilityModel;
/** @package  */
use RoleManager;

// use App\Models\Menu;
// use App\Models\SubSystem;

class Ability extends BaseAbilityModel
{
	public $table = 'abilities';

	public static $generators = [];
	protected static $_autotitle = false;

	const TARGET_MENU = 0;
	const TARGET_SUBSYSTEM = 1;
	const TARGET_SIGNS = ['@', '#'];
	const TARGET_CLASSES = ['Menu', 'SubSystem'];
	const TYPES = ['index', 'create', 'update', 'delete', 'export', 'upload'];
	public static $TARGET_PREFIXES = []; // will fill After class
	public static function signTarget($sign) {
		$result = array_search($sign, self::TARGET_SIGNS);
		return $result === false ? -1 : $result;
	}

	public static function __callStatic($methodName, $arguments)
	{
		$generatorInstance = self::g();
		if(in_array($methodName, ['can', 'on', 'in', 'target', 'title', 'menu', 'subsystem'])) /// get_class_methods($generatorInstance)
			return  call_user_func_array([$generatorInstance, $methodName], $arguments);
		else
			return  forward_static_call_array([ method_exists(Ability::class, $methodName) ? Ability::class : BaseAbilityModel::class, $methodName], $arguments);
	}

	public static function toPermissions($abilities) {
		$permissions = [];
		foreach($abilities as $ability) {
			$ability_parsed = $ability->parse();
			$target = $ability_parsed->target(); // Target in JS Acceptable Format, eg: s9, m16, ...
			$action = $ability_parsed->can();

			if(!isset($permissions[$target]))
				$permissions[$target] = [0,0,0,0,0,0];

			$resIndex = array_search($action, static::TYPES);
			if($resIndex !== false)
				$permissions[$target][$resIndex] = 1;
		}
		return $permissions;
	}

	public static function toRoutes($abilities, $keyBy="route") {
		$permissions = [];
		foreach($abilities as $ability) {
			$ability_parsed = $ability->parse();
			if($ability_parsed->target(true)) // == 1
				continue; // is a subsystem
			$target = \Modules\AccessLevel\Models\Menu::find($ability_parsed->menu());
			if(!$target)
				continue;

			$target = $target->{$keyBy}; // Target menu route
			$action = $ability_parsed->can();

			if(!isset($permissions[$target]))
				$permissions[$target] = [0,0,0,0,0,0];

			$resIndex = array_search($action, static::TYPES);
			if($resIndex !== false)
				$permissions[$target][$resIndex] = 1;
		}
		return $permissions;
	}

	/* public static function toMenu($abilities) {
		$data = [];
		foreach($abilities as $ability) {
			$ability_parsed = $ability->parse();
			$target = $ability_parsed->on(); // get type(menu/subsystem) & id of target

			$result = [];
			if($target[1]) // is subsystem
			;
			else // is menu
			;

			$data []= $result;

			/* $target = $ability_parsed->target(); // Target in JS Acceptable Format, eg: s9, m16, ...
			$action = $ability_parsed->can();

			if(!isset($permissions[$target]))
				$permissions[$target] = [0,0,0,0,0,0];

			$resIndex = array_search($action, static::TYPES);
			if($resIndex !== false)
				$permissions[$target][$resIndex] = 1; * /
		}
		return $data;
	} */

	public static function findFrom($_menu_id, $which=0) {
		if($which == static::TARGET_MENU)
			return collect(Ability::where('name', 'LIKE', Ability::g()->on($_menu_id)->query())->get())->unique('id');
		return [];
	}

	public function findRoles() {
		return $this->users;//->with('roles');
	}

	public function parse() {
		return static::g($this->name);
	}

	public static function g($query='') { // Ability Generator
		$generator = new class {
			protected $_can = null;
			protected $_on = [0,0];
			protected $_in = null;
			protected $_title = null;
			protected $_autotitle = null;
			public function __construct() {
				$this->_autotitle = function($action, $target, $field){
					$title = call_user_func(array('Modules\AccessLevel\Models\\'.Ability::TARGET_CLASSES[$target[1]], 'find'), $target[0]);
					if(!$title)
						return '';

					$title = ucfirst($action) .  ' ' . $title->title;
					if($field)
						$title .= " [{$field}]";
					return $title;
				};
			}
			public function __call($methodName, $arguments)
			{
				if(in_array($methodName, get_class_methods($this)))
					return  call_user_func_array([$this, $methodName], $arguments);
				return call_user_func_array([$this->get(), $methodName], $arguments);
			}
			public function can($action = null) {
				if(!$action)
					return $this->_can;
				$this->_can = strtolower($action);
				return $this;
			}
			public function on($unique_id = null, $target=0) {
				if(!$unique_id)
					return $this->_on;

				if($this->_on[0]) // if target is set, Set field
					return $this->in($unique_id);

				if(is_array($unique_id))
					$this->_on = $unique_id;
				else
					$this->_on = [intval(floatval($unique_id)), $target];
				return $this;
			}
			public function target($value=null) {
				if(!$value || $value === true) {
					if(!$this->_on[0])
						return null;
					return $value ? $this->_on[1] : (@Ability::$TARGET_PREFIXES[$this->_on[1]] . $this->_on[0]);
				}
				$result = array_search($value[0], Ability::$TARGET_PREFIXES);
				if($result !== false) {
					if($result)
						$this->subsystem(substr($value, 1));
					else
						$this->menu(substr($value, 1));
				}
				return $this;
			}
			public function menu($unique_id = null) {
				if(!$unique_id)
					return $this->_on[0];

				$this->_on = [intval(floatval($unique_id)), Ability::TARGET_MENU];
				return $this;
			}
			public function subsystem($unique_id = null) {
				if(!$unique_id)
					return $this->_on[0];

				$this->_on = [intval(floatval($unique_id)), Ability::TARGET_SUBSYSTEM];
				return $this;
			}
			public function in($field = null) {
				if(!$field)
					return $this->_in;
				$this->_in = trim($field);
				return $this;
			}
			public function title($title = null) {
				if(!$title) {
					if(!$this->_title)
						$this->title($this->commit()->title);
					return $this->_title;
				}
				$this->_title = trim($title);
				return $this;
			}
			public function autotitle($value) {
				if(is_callable($value)) {
					$this->_autotitle = $value;
				}
				elseif(!$value)
					$this->_autotitle = null;

				return $this;
			}

			public function find($returnType = 0)
			{
				$queryBuilder = Ability::where('name', 'LIKE', $this->query());;
				return  $returnType ? $queryBuilder : $queryBuilder->get();// "%-@{$_menu_id}%"
			}

			public function query()
			{
				$targetSign = @Ability::TARGET_SIGNS[$this->_on[1]];

				$query = $this->_can ?? '%';
				$query .=$this->_on[0] ?  "-{$targetSign}{$this->_on[0]}{$targetSign}" : ($this->_can ? '%' :'');
				$query .= $this->_in ? '.'.$this->_in : (($this->_can || $this->_on[0]) ? '%' :'');

				return $query;
			}

			public function g()
			{
				if(!($this->_can && $this->_on[0]))
					throw new Error('"can" and "on" must be set');

				$targetSign = @Ability::TARGET_SIGNS[$this->_on[1]];
				$query = "{$this->_can}-{$targetSign}{$this->_on[0]}{$targetSign}";
				if($this->_in)
					$query .= '.'.$this->_in;

				return $query;
			}

			public function commit()
			{
				$autoTitle = $this->_autotitle;
				$mAbility = Ability::firstOrCreate(['name' => $this->g()]);
				$destTitle = trim($this->_title ? $this->title() : ($autoTitle ? $autoTitle($this->_can, $this->_on, $this->_in) : ''));
				if($destTitle) {
					$mAbility->title = $destTitle;
					$mAbility->save();
				}
				elseif($mAbility->title)
					$this->title($mAbility->title);

				return $mAbility;
			}

			public function get()
			{
				return $this->commit();
			}

			public function __toString()
			{
				return $this->g();
			}

			public function exists()
			{
				return Ability::firstOrNew(['name' => $this->g()])->exists;
			}
		};
		self::$generators []= $generator;
		if(self::$_autotitle || is_null(self::$_autotitle))
			$generator->autotitle(self::$_autotitle);

		if(!$query)
			return $generator;

		$title = null;
		if($query instanceof Ability) {
			$title = $query->title;
			$query = $query->name;
		}

		if(strpos($query, '-')) {
			$target = strpos($query, @Ability::TARGET_SIGNS[Ability::TARGET_MENU]) ? Ability::TARGET_MENU : Ability::TARGET_SUBSYSTEM;
			$sign = @Ability::TARGET_SIGNS[$target];

			$parsed = explode( '-'.$sign, $query);
			$generator->can($parsed[0]);
			if(strpos($query, '.')) {
				$parsed = explode('.', $parsed[1]);
				$generator->on(str_replace($sign, '',  $parsed[0]), $target)->on($parsed[1]);
			}
			else
				$generator->on(str_replace($sign, '',$parsed[1]), $target);
		}
		else
			$generator->can($query);

		if($title)
			$generator->title($title);

		return $generator;
	}

	public function getRoles()
	{
		return $this->roles;
	}

	public function getUsers()
	{
		return $this->users;
	}

	public function allowTo($target)
	{
		RoleManager::allow($target)->to($this);
		return $this;
	}
	public function disallowTo($target)
	{
		RoleManager::disallow($target)->to($this);
		return $this;
	}
	public function forbidFrom($target)
	{
		RoleManager::forbid($target)->to($this);
		return $this;
	}
	public function unforbidFrom($target)
	{
		RoleManager::unforbid($target)->to($this);
		return $this;
	}

	public static function autoTitle($value) {
		if(is_callable($value) || !$value) {
			if(!$value)
				$value = null;
			self::$_autotitle = $value;
			foreach(self::$generators as $generator)
				$generator->autotitle($value);
		}
	}
}
Ability::$TARGET_PREFIXES = [Menu::$js_prefix, SubSystem::$js_prefix];
