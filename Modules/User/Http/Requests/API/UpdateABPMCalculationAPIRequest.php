<?php

namespace Modules\User\Http\Requests\API;

use Modules\User\Models\ABPMCalculation;
use Modules\CrudGenerator\Request\APIRequest;

class UpdateABPMCalculationAPIRequest extends APIRequest
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
        $rules = ABPMCalculation::$rules;

        return $rules;
    }
}
