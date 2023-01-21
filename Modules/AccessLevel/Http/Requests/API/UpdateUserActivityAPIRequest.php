<?php

namespace Modules\AccessLevel\Http\Requests\API;

use Modules\AccessLevel\Models\UserActivity;
use Modules\CrudGenerator\Request\APIRequest;

class UpdateUserActivityAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = UserActivity::$rules;
        
        return $rules;
    }
}
