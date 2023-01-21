<?php

namespace Modules\Panel\Http\Controllers\API;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Cookie;

class LocaleController extends Controller
{
 public function change()
 {
     app()->setlocale(request('locale'));
     Cookie::queue('locale',request('locale'),864000);
     return response()->json([
        'ok'=>true,
        'data'=>[
            'locale'=>app()->getLocale()
        ]
     ]);
 }
}
