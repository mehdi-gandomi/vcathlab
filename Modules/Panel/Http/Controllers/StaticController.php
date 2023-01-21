<?php

namespace Modules\Panel\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Modules\Panel\Iracode;

class StaticController extends Controller
{

        /**
     * Serve the requested stylesheet.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function show(Request $request)
    {
        $static = Arr::get(Iracode::allStaticFiles(), $request->static);

        abort_if(is_null($static['path']), 404);
        return response()->download($static['path']);
        // return response(
        //     file_get_contents($path),
        //     200,
        //     [
        //         'Content-Type' => 'text/css',
        //     ]
        // )->setLastModified(DateTime::createFromFormat('U', filemtime($path)));
    }


}
