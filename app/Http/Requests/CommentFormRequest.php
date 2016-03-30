<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CommentFormRequest extends Request
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
        return [
            'comment_content' => 'required|min:10',
            'comment_created_by' => 'required|min:4',
            'email' => 'required|email'
        ];
    }
}
