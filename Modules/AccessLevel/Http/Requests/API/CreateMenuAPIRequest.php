<?php

namespace Modules\AccessLevel\Http\Requests\API;

use Modules\AccessLevel\Models\Menu;
use Modules\CrudGenerator\Request\APIRequest;

class CreateMenuAPIRequest extends APIRequest
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
        return Menu::$rules;
    }
}
