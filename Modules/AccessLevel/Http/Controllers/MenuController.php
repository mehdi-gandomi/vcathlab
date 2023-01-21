<?php

namespace Modules\AccessLevel\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\AccessLevel\Core\Permissions;

class MenuController extends Controller
{
	public function index()
	{
		return Permissions::generateMenus();
	}
}
