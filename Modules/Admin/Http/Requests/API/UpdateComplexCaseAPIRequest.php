<?php

namespace Modules\Admin\Http\Requests\API;

use Modules\Admin\Models\ComplexCase;
use Modules\CrudGenerator\Request\APIRequest;

class UpdateComplexCaseAPIRequest extends APIRequest
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
        $rules = ComplexCase::$rules;
        
        return $rules;
    }
}
