<?php

namespace Modules\Admin\Http\Requests\API;

use Modules\Admin\Models\Comment;
use Modules\CrudGenerator\Request\APIRequest;

class UpdateCommentAPIRequest extends APIRequest
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
        $rules = Comment::$rules;
        
        return $rules;
    }
}
