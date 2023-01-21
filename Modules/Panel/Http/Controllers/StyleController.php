<?php

namespace Modules\Panel\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Modules\Panel\Iracode;

class StyleController extends Controller
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
        $style = Arr::get(Iracode::allStyles(), $request->style);

        abort_if(is_null($style['path']), 404);

        return response(
            file_get_contents($style['path']),
            200,
            [
                'Content-Type' => 'text/css',
            ]
        )->setLastModified(DateTime::createFromFormat('U', filemtime($style['path'])));
    }


}
