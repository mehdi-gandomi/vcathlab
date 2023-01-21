<?php

namespace Modules\User\Http\Controllers\API;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\Models\ComputationCenter;

class ComputationCenterController extends Controller
{
    public function store(Request $request)
    {
        $data=$request->validate([
            "name"=>"required",
            "age"=>"required",
            "physician"=>"required",
            "sex"=>'required',
            "hospital"=>'required',
            "mobile"=>'required'
        ]);
        $data['user_id']=auth()->user()->id;
        $ComputationCenter=ComputationCenter::create($data);
        $sendsms="http://ippanel.com:8080/?apikey=gHsfMyLljTpjDLaxWf0J-l2u3ELBBFMh9yd_6NzA4KA=&pid=07hunzvxhuvohky&fnum=3000505&tnum=".$data['mobile']."&p1=link&v1=".$link;

    }
}
