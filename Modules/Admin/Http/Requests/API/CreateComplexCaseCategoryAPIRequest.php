<?php

namespace Modules\Admin\Http\Requests\API;

use Modules\Admin\Models\ComplexCaseCategory;
use Modules\CrudGenerator\Request\APIRequest;

class CreateComplexCaseCategoryAPIRequest extends APIRequest
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
        return ComplexCaseCategory::$rules;
    }
}
