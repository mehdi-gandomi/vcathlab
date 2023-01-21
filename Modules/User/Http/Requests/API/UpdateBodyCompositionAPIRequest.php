<?php

namespace Modules\User\Http\Requests\API;

use Modules\User\Models\BodyComposition;
use Modules\CrudGenerator\Request\APIRequest;

class UpdateBodyCompositionAPIRequest extends APIRequest
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
        $rules = BodyComposition::$rules;
        
        return $rules;
    }
}
