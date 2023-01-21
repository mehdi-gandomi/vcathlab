<?php

namespace Modules\Panel\Http\Controllers\API;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class GetUserProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        \abort_unless(auth()->check(),403);
        $user=User::where("id",$request->get("id"))->with("profile")->firstOrFail();
        return response()->json([
            'ok'=>true,
            'userData'=>$user
        ]);
    }
}
