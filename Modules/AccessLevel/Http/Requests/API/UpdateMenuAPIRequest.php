<?php

namespace Modules\AccessLevel\Http\Requests\API;

use Modules\AccessLevel\Models\Menu;
use Modules\CrudGenerator\Request\APIRequest;

class UpdateMenuAPIRequest extends APIRequest
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
        $rules = Menu::$rules;
        
        return $rules;
    }
}
