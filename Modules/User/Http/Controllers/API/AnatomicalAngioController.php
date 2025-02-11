<?php

namespace Modules\User\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Modules\User\Http\Requests\API\CreateAngiographyAPIRequest;
use Modules\User\Http\Requests\API\UpdateAngiographyAPIRequest;
use Modules\User\Models\BodyComposition;
use Modules\User\Repositories\AngiographyRepository;
use Response;

/**
 * Class AngiographyController
 * @package Modules\User\Http\Controllers\API
 */

class AnatomicalAngioController extends AppBaseController
{
    public function generate_report(Request $request){

    }
}
