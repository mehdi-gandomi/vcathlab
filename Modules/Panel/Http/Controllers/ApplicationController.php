<?php

namespace Modules\Panel\Http\Controllers;

use App\Http\Controllers\Controller;

class ApplicationController extends Controller
{
    public function __invoke()
    {
        return view('panel::application');
    }
}
