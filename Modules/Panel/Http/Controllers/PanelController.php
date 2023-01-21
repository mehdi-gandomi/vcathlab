<?php

namespace Modules\Panel\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PanelController extends Controller
{
   public function maintenance()
   {
       return view("panel::maintenance");
   }
}
