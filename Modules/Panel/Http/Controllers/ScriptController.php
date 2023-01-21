<?php

namespace Modules\Panel\Http\Controllers;

use DateTime;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Modules\Panel\Iracode;

class ScriptController extends Controller
{
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(Request $request)
    {
        \Config::set("database.default","mysql");
        $script = Arr::get(Iracode::allScripts(), $request->script);
        if(!$script) $script=Arr::get(Iracode::allBottomScripts(), $request->script);
        abort_if(is_null($script), 404);

        return response(
            file_get_contents($script['path']),
            200,
            [
                'Content-Type' => 'application/javascript',
            ]
        )->setLastModified(DateTime::createFromFormat('U', filemtime($script['path'])));
    }

}
