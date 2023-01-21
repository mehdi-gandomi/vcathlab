<?php

namespace Modules\Panel\Http\Controllers\API;

use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum");
    }
	public function index()
	{
		// if(class_exists('Modules\AccessLevel\Http\Controllers\MenuController'))
		// 	return app(\Modules\AccessLevel\Http\Controllers\MenuController::class)->index();
		return config("panel.menu");
	}
}
