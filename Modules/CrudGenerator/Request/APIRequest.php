<?php

namespace Modules\CrudGenerator\Request;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Modules\CrudGenerator\Utils\ResponseUtil;
use Response;

class APIRequest extends FormRequest
{
    /**
     * Get the proper failed validation response for the request.
     *
     * @param array $errors
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function response(array $errors)
    {
        $messages = implode(' ', Arr::flatten($errors));

        return Response::json(ResponseUtil::makeError($messages), 400);
    }
}
