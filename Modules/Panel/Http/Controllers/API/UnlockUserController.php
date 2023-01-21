<?php

namespace Modules\Panel\Http\Controllers\API;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UnlockUserController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate( [
            'password' => 'required|string'
        ]);
        $user=auth()->user();
        if ($user &&
            Hash::check($request->password, $user->password)) {
            return response()->json([
                'ok'=>true,
                'message'=>__("Password was true")
            ]);
        }
        return response()->json([
            'ok'=>false,
            'message'=>__("Password is incorrect")
        ]);
    }
}
