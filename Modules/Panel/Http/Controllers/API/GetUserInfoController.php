<?php

namespace Modules\Panel\Http\Controllers\API;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GetUserInfoController extends Controller
{
    public function __invoke(Request $request)
    {
        \abort_unless(auth()->check(),403);
        $user=$request->user();
        return response()->json([
            'ok'=>true,
            'userData'=>$user
        ]);
    }
}
