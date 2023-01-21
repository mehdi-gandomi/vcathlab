<?php

namespace Modules\Panel\Http\Controllers\API;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NotificationController extends Controller
{
    public function markAsRead()
    {
        $user=auth()->user();
        $user->unreadNotifications->markAsRead();
        return response()->json([
            'ok'=>true,
            'data'=>$user->notifications
        ]);
    }
    public function index()
    {
        $user=auth()->user();
        return response()->json([
            'ok'=>true,
            'data'=>$user->notifications
        ]);
    }
}
